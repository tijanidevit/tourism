<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(Request $request) : View {

        $destinations = Destination::withCount('ratings')
        ->filterBy('state', $request->state)
        ->where(function ($query) use ($request) {
            return $query
                ->search('name', $request->search)
                ->orSearch('description', $request->search)
                ->orSearch('area', $request->search)
                ->orSearch('address', $request->search);
        })->latest()->paginate();

        return view('app.home', compact('destinations'));
    }
}
