<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke() : View {
        $users_count = User::onlyUser()->count();
        $destinations_count = Destination::count();

        $users = User::onlyUser()->withCount('visits')->latest()->take(5)->get();
        $destinations = Destination::withCount('visits')->latest()->take(5)->get();

        return view('dashboard', compact('users_count', 'destinations_count', 'users', 'destinations'));
    }
}
