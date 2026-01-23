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

        $validated['status'] = 'approved';
        Tutor::create($validated);

        return redirect()->route('tutors.apply')
            ->with('success', 'Application submitted successfully! Your profile is now live and visible to students.');
    }

    public function request(Tutor $tutor)
    {
        return redirect()->route('tutors.find')
            ->with('success', "Your request for {$tutor->name} has been submitted! We'll match you shortly.");
    }

    public function profile()
    {
        // Dummy data for the profile page
        $user = [
            'name' => 'Alex Johnson',
            'initials' => 'AJ',
            'email' => 'alex.johnson@student.cmgt.nl',
            'role' => 'Student',
            'joined_date' => 'September 2023',
        ];

        $stats = [
            'total_sessions' => 12,
            'hours_learned' => 18,
            'upcoming_sessions' => 2,
        ];

        $upcoming_sessions = [
            [
                'subject' => 'Mathematics',
                'tutor' => 'Sarah Smith',
                'date' => 'Oct 24, 2023',
                'time' => '14:00 - 15:30',
            ],
            [
                'subject' => 'Physics',
                'tutor' => 'Mike Brown',
                'date' => 'Oct 26, 2023',
                'time' => '10:00 - 11:30',
            ],
        ];

        return view('profile', [
            'user' => $user,
            'stats' => $stats,
            'upcoming_sessions' => $upcoming_sessions,
        ]);
    }
}
