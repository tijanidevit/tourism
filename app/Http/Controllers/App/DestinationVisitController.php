<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\DestinationVisit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DestinationVisitController extends Controller
{
    public function __invoke(Request $request) : View {

        $visits = DestinationVisit::withCount('destination')
        ->filterBy('user_id', auth()->id())
        ->where(function ($query) use ($request) {
            return $query->search('date_of_visit', $request->search);
        })->latest()->paginate();

        return view('app.destination.booking', compact('visits'));
    }
}
