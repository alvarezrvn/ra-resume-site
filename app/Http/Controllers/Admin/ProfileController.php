<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        return Inertia::render('Admin/Profile/Index', [
            'profile' => $profile,
        ]);
    }

    public function edit()
    {
        $profile = Profile::firstOrCreate([]);

        return Inertia::render('Admin/Profile/Edit', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255',
            'summary' => 'nullable|string',
            'profile_image' => 'nullable|string',
        ]);

        $profile = Profile::firstOrCreate([]);
        $profile->update($validated);

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile updated successfully.');
    }
}
