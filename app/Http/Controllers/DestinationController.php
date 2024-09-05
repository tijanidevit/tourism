<?php

namespace App\Http\Controllers;

use App\Http\Requests\Destination\StoreDestinationRequest;
use App\Models\Destination;
use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DestinationController extends Controller
{
    use FileTrait;

    public function index(Request $request) : View {
        $destinations = Destination::withCount('ratings')
                        ->filterBy('state', $request->state)
                        ->search('name', $request->search)
                        ->orSearch('description', $request->search)
                        ->orSearch('area', $request->search)
                        ->orSearch('address', $request->search)
                        ->paginate();
        return view('destination.index', compact('destinations'));
    }

    public function show($id) : View {
        $destination = Destination::withCount('ratings')->whereId($id)->firstOrFail();
        $destination->visits = $destination->visits()->with('user')->paginate();

        return view('destination.show', compact('destination'));
    }

    public function store(StoreDestinationRequest $request) : RedirectResponse {
        $data = $request->validated();
        $data['image'] = $this->uploadFile('destination/images', $data['image']);
        $destination = Destination::create($data);

        return to_route('destination.show', $destination->id)->with('success', 'Destination created successfully');
    }
}
