<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destination\StoreDestinationRequest;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use App\Traits\FileTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    use FileTrait, ResponseTrait;

    public function index(Request $request): JsonResponse
    {
        $destinations = Destination::withCount('ratings')
            ->filterBy('state', $request->state)
            ->where(function ($query) use ($request) {
                return $query
                    ->search('name', $request->search)
                    ->orSearch('description', $request->search)
                    ->orSearch('area', $request->search)
                    ->orSearch('address', $request->search);
            })
            ->latest()
            ->paginate();
        return $this->paginatedCollection(data: DestinationResource::collection($destinations));
    }

    public function show($id): JsonResponse
    {
        $destination = Destination::withCount('ratings')->whereId($id)->first();

        if (!$destination) {
            return $this->notFoundResponse();
        }

        return $this->successResponse(data:new DestinationResource($destination));
    }

    public function bookVisit(StoreDestinationRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile('destination/images', $data['image']);
        $destination = Destination::create($data);

        return to_route('destination.show', $destination->id)->with('success', 'Destination created successfully');
    }
}
