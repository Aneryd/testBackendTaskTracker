<?php

namespace App\Services\Task;

use App\Models\Task;
use Illuminate\Support\Carbon;
use App\Http\Requests\Task\IndexTaskRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;

class TaskService
{
    public function index(IndexTaskRequest $request)
    {
        $tasks = Task::query();
        if ($request->has('status_id')) {
            $tasks = $tasks->where("status_id", '=', $request->status_id);
        }
        if ($request->has('date_from') || $request->has('date_to')) {
            if ($request->has('date_from')) {
                $tasks = $tasks->whereDate("end_date", '>=', Carbon::parse($request->date_from));
            }
            if ($request->has('date_to')) {
                $tasks = $tasks->whereDate("end_date", '<=',  Carbon::parse($request->date_to));
            }
        }
        return $tasks->with("status")->paginate($request->per_page ?? 15);
    }

    public function show(Task $task)
    {
        return $task->load("status");
    }

    public function store(StoreTaskRequest $request)
    {
        return Task::create([
            "name" => $request->name,
            "description" => $request->description ?? null,
            "end_date" => $request->end_date ?? null,
            "status_id" => $request->status_id ?? 1,
        ]);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->toArray());
        return $task;
    }
    public function destroy(Task $task)
    {
        return $task->delete();
    }
}
