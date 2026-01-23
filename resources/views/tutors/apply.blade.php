@extends('layouts.app')

@section('title', 'Become a Tutor')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-box rounded-lg shadow p-6">
            <h2 class="text-xl text-textMain font-semibold mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Become a Part-Time Tutor
            </h2>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-6">
                <p class="text-sm text-blue-900">
                    <strong>Government-Funded Program:</strong> Earn hourly compensation for tutoring students.
                    Set your own schedule and work part-time while making a difference!
                </p>
            </div>

            <form method="POST" action="{{ route('tutors.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-accentText mb-2">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter your full name">
                </div>

                <div>
                    <label class="block text-sm font-medium text-accentText mb-2">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="your.email@example.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-accentText mb-2">Subject You Can Teach *</label>
                    <select name="subject_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select a subject</option>
                        @foreach($subjects as $subject)
                            <option
                                value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-accentText mb-2">Teaching Level *</label>
                    <select name="level_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select your level</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-accentText mb-2">Years of Experience *</label>
                    <input type="number" name="experience_years" value="{{ old('experience_years') }}" required min="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="e.g., 5">
                </div>

                <div>
                    <label class="block text-sm font-medium text-accentText mb-2">Hours Available Per Week *</label>
                    <input type="number" name="hours_available" value="{{ old('hours_available') }}" required min="1"
                           max="40"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="e.g., 10">
                    <p class="text-xs text-accentText mt-1">Part-time positions: 5-20 hours/week recommended</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-accentText mb-2">Bio / Teaching Philosophy *</label>
                    <textarea name="bio" rows="4" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Tell us about your teaching experience and philosophy...">{{ old('bio') }}</textarea>
                </div>

                <button type="submit"
                        class="w-full bg-accentText text-box py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Submit Application
                </button>
            </form>
        </div>

        <div class="mt-4 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h3 class="font-semibold text-box mb-2">Why Become a Tutor?</h3>
            <ul class="text-sm text-box space-y-1">
                <li>• Free for students - government funded</li>
                <li>• Earn hourly compensation from the government</li>
                <li>• Perfect part-time opportunity</li>
                <li>• Set your own schedule</li>
                <li>• Make a difference in your community</li>
            </ul>
        </div>
    </div>
@endsection
