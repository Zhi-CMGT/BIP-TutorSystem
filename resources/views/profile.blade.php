@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Profile Header -->
        <div class="bg-box rounded-lg shadow p-6 mb-6 flex flex-col md:flex-row items-center md:items-start gap-6">
            <div class="w-24 h-24 bg-accent rounded-full flex items-center justify-center text-white text-3xl font-bold shrink-0">
                {{ $user['initials'] }}
            </div>
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-2xl font-bold text-textMain mb-1">{{ $user['name'] }}</h1>
                <p class="text-accentText mb-4">{{ $user['role'] }}</p>
                <div class="flex flex-wrap justify-center md:justify-start gap-4 text-sm text-gray-300">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        {{ $user['email'] }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Joined {{ $user['joined_date'] }}
                    </div>
                </div>
            </div>
            <button class="bg-accentText text-box px-4 py-2 rounded-lg font-semibold hover:bg-blue-200 transition-colors">
                Edit Profile
            </button>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mb-6">
            <!-- Stats Cards -->
            <div class="bg-box rounded-lg shadow p-6">
                <h3 class="text-accentText text-sm font-semibold uppercase mb-2">Total Sessions</h3>
                <p class="text-3xl font-bold text-textMain">{{ $stats['total_sessions'] }}</p>
            </div>
            <div class="bg-box rounded-lg shadow p-6">
                <h3 class="text-accentText text-sm font-semibold uppercase mb-2">Hours Learned</h3>
                <p class="text-3xl font-bold text-textMain">{{ $stats['hours_learned'] }}</p>
            </div>
            <div class="bg-box rounded-lg shadow p-6">
                <h3 class="text-accentText text-sm font-semibold uppercase mb-2">Upcoming</h3>
                <p class="text-3xl font-bold text-textMain">{{ $stats['upcoming_sessions'] }}</p>
            </div>
        </div>

        <!-- Recent Activity / Schedule -->
        <div class="bg-box rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-textMain mb-4">Upcoming Schedule</h2>
            <div class="space-y-4">
                @forelse($upcoming_sessions as $session)
                    <div class="flex items-center justify-between p-4 bg-bgMain rounded-lg border border-gray-700">
                        <div class="flex items-center gap-4">
                            <div class="bg-accent/20 text-accent p-3 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-textMain">{{ $session['subject'] }}</h4>
                                <p class="text-sm text-gray-400">with {{ $session['tutor'] }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-textMain font-medium">{{ $session['date'] }}</p>
                            <p class="text-sm text-accentText">{{ $session['time'] }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 text-center py-4">No upcoming sessions scheduled.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
