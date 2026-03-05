<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::orderBy('order')->orderBy('start_date', 'desc')->get();

        return Inertia::render('Admin/Education/Index', [
            'education' => $education,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Education/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'gpa' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'integer',
        ]);

        Education::create($validated);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education created successfully.');
    }

    public function edit(Education $education)
    {
        return Inertia::render('Admin/Education/Edit', [
            'education' => $education,
        ]);
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'gpa' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'integer',
        ]);

        $education->update($validated);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('admin.education.index')
            ->with('success', 'Education deleted successfully.');
    }
}
