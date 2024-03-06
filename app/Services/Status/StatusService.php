<?php

namespace App\Services\Status;

use App\Models\Status;
use App\Http\Requests\Status\StoreStatusRequest;
use App\Http\Requests\Status\UpdateStatusRequest;

class StatusService
{
    public function index()
    {
        return Status::all();
    }

    public function show(Status $status)
    {
        return $status;
    }

    public function store(StoreStatusRequest $request)
    {
        return Status::create([
            "name" => $request->name
        ]);
    }

    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->update($request->toArray());
        return $status;
    }

    public function destroy(Status $status)
    {
        return $status->delete();
    }
}

