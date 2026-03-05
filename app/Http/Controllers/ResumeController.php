<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;

class ResumeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $experiences = Experience::orderBy('order')->orderBy('start_date', 'desc')->get();
        $education = Education::orderBy('order')->orderBy('start_date', 'desc')->get();
        $skills = Skill::orderBy('order')->orderBy('category')->get();
        $projects = Project::orderBy('order')->orderBy('start_date', 'desc')->get();

        return Inertia::render('Resume/Index', [
            'profile' => $profile,
            'experiences' => $experiences,
            'education' => $education,
            'skills' => $skills,
            'projects' => $projects,
        ]);
    }
}
