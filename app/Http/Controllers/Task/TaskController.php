<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Services\Task\TaskService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\IndexTaskRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\PageTaskResource;
use App\Http\Resources\Task\IndexTaskResource;

class TaskController extends Controller
{
    private TaskService $taskService;

    public  function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(IndexTaskRequest $request)
    {
        return IndexTaskResource::collection($this->taskService->index($request));
    }

    public function show(Task $task)
    {
        return (new PageTaskResource($this->taskService->show($task)));
    }

    public function store(StoreTaskRequest $request)
    {
        return (new PageTaskResource($this->taskService->store($request)));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        return (new PageTaskResource($this->taskService->update($request, $task)));
    }

    public function destroy(Task $task)
    {
        return response()->json($this->taskService->destroy($task), 204);
    }
}
