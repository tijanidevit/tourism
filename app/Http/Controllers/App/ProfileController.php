<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use FileTrait;

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate(['image' => 'required|file|mimes:png,jpg']);
        $data['image'] = $this->uploadFile('user/images', $request->image);

        User::whereId(auth()->id())->update($data);

        return to_route('app.profile.index')->with('success', 'Profile image updated successfully');
    }
}
