<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Destination\StoreFeedbackRequest;
use App\Http\Requests\App\Destination\StoreVisitRequest;
use App\Models\Destination;
use App\Models\DestinationVisit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DestinationController extends Controller
{
    public function show($id): View
    {
        $destination = Destination::with('latestRatings.user')->withCount('ratings')->whereId($id)->firstOrFail();

        return view('app.destination.show', compact('destination'));
    }

    public function rate(StoreFeedbackRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $destination = Destination::withCount('ratings')->whereId($id)->firstOrFail();

        $newRating = ($data['rating'] + $destination->rating) / ($destination->ratings_count + 1);

        $destination->ratings()->create($data);


        $destination->update(['rating' => $newRating]);

        return back()->with('success', 'Review submitted successfully');
    }

    public function book(StoreVisitRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $destination = Destination::whereId($id)->firstOrFail();
        $destination->visits()->create($data);

        $destination->increment('visit', 1);

        return back()->with('success', 'Visit booked successfully');
    }

    public function visits(Request $request): View
    {
        $visits = DestinationVisit::where('user_id', auth()->id())->with(['destination' => function ($query) {
            $query->withCount('ratings');
        }])->paginate();

        return view('app.destination.visits', compact('visits'));
    }
}
