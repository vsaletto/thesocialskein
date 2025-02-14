<?php

namespace App\Http\Controllers;

// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Debugging: Dump user data
        dd($user);

        $request->validate([
            'cover_photo' => 'nullable|image|max:2048',
            'social_links' => 'nullable|json',
        ]);

        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('cover_photos', 'public');
            $user->cover_photo = $path;
        }

        $user->social_links = json_decode($request->social_links, true) ?? [];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

