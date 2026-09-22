<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $skills = Skill::query()->when($request->category, fn ($query, $category) => $query->where('category', $category))->latest()->get();
        return Inertia::render('Skills/Index', ['skills' => $skills, 'categories' => Skill::query()->distinct()->pluck('category')]);
    }

    public function show(Skill $skill)
    {
        return Inertia::render('Skills/Show', ['skill' => $skill->load(['modules.lessons', 'projects'])]);
    }

    public function enroll(Request $request, Skill $skill)
    {
        $request->user()->enrollments()->firstOrCreate(['skill_id' => $skill->id], ['last_active_at' => now()]);
        return to_route('dashboard')->with('success', 'Skill ditambahkan ke perjalananmu.');
    }
}