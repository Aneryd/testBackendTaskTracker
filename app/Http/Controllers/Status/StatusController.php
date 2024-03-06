<?php

namespace App\Http\Controllers\Status;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Status\StatusService;
use App\Http\Requests\Status\StoreStatusRequest;
use App\Http\Requests\Status\UpdateStatusRequest;
use App\Http\Resources\Status\IndexStatusResource;

class StatusController extends Controller
{
    private StatusService $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function index()
    {
        return IndexStatusResource::collection($this->statusService->index());
    }

    public function show(Status $status)
    {
        return (new IndexStatusResource($this->statusService->show($status)));
    }

    public function store(StoreStatusRequest $request)
    {
        return (new IndexStatusResource($this->statusService->store($request)));
    }

    public function update(UpdateStatusRequest $request, Status $status)
    {
        return (new IndexStatusResource($this->statusService->update($request, $status)));
    }

    public function destroy(Status $status)
    {   
        return response()->json($this->statusService->destroy($status), 204);
    }
}
