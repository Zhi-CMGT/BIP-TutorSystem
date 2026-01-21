<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Subject;
use App\Models\Level;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index()
    {
        return redirect()->route('tutors.find');
    }

    public function find(Request $request)
    {
        $query = Tutor::with(['subject', 'level'])
            ->where('status', 'approved');

        if ($request->filled('subject_id')) {
            $query->where('subject_id', $request->subject_id);
        }

        if ($request->filled('level_id')) {
            $query->where('level_id', $request->level_id);
        }

        $tutors = $query->orderBy('rating', 'desc')->get();
        $subjects = Subject::orderBy('name')->get();
        $levels = Level::orderBy('id')->get();

        return view('tutors.find', [
            'tutors' => $tutors,
            'subjects' => $subjects,
            'levels' => $levels,
            'selectedSubject' => $request->subject_id,
            'selectedLevel' => $request->level_id,
        ]);
    }

    public function apply()
    {
        $subjects = Subject::orderBy('name')->get();
        $levels = Level::orderBy('id')->get();

        return view('tutors.apply', [
            'subjects' => $subjects,
            'levels' => $levels,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tutors,email',
            'subject_id' => 'required|exists:subjects,id',
            'level_id' => 'required|exists:levels,id',
            'experience_years' => 'required|integer|min:0',
            'hours_available' => 'required|integer|min:1|max:40',
            'bio' => 'required|string|min:50',
        ]);

        Tutor::create($validated);

        return redirect()->route('tutors.apply')
            ->with('success', 'Application submitted successfully! We will review your profile and get back to you within 2-3 business days.');
    }

    public function request(Tutor $tutor)
    {
        return redirect()->route('tutors.find')
            ->with('success', "Your request for {$tutor->name} has been submitted! We'll match you shortly.");
    }
}
