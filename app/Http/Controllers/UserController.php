<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request) : View {
        $users = User::onlyUser()->where(function ($query) use($request) {
            $query->search('name', $request->search)->orSearch('email', $request->search);
        })->withCount('visits')->paginate();
        return view('user.index', compact('users'));
    }

    public function show($id) : View {
        $user = User::onlyUser()->whereId($id)->firstOrFail();
        $user->visits = $user->visits()->with('destination')->paginate();

        return view('user.show', compact('user'));
    }
}
