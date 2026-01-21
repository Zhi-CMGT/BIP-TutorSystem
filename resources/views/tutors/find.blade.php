@extends('layouts.app')

@section('title', 'Find a Tutor')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Filters -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Find Your Free Tutor
            </h2>

            <div class="bg-green-50 border border-green-200 rounded-lg p-3 mb-4">
                <p class="text-sm text-green-900">
                    <strong>100% Free:</strong> All tutoring sessions are provided at no cost through government
                    funding.
                </p>
            </div>

            <form method="GET" action="{{ route('tutors.find') }}" class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                    <select name="subject_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">All Subjects</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $selectedSubject == $subject->id ? 'selected' : '' }}>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                    <select name="level_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">All Levels</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}" {{ $selectedLevel == $level->id ? 'selected' : '' }}>
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        Search Tutors
                    </button>
                </div>
            </form>
        </div>

        <!-- Tutors List -->
        <div class="mb-4">
            <h3 class="text-sm font-medium text-gray-500">{{ $tutors->count() }} tutors available</h3>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($tutors as $tutor)
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                                {{ $tutor->initials }}
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-900">{{ $tutor->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $tutor->subject->name }}</p>
                            </div>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">
                        {{ $tutor->level->name }}
                    </span>
                    </div>

                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($tutor->bio, 100) }}</p>

                    <div class="flex items-center justify-between text-sm mb-3">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center text-yellow-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="ml-1 font-semibold">{{ $tutor->rating }}</span>
                                <span class="text-gray-500 ml-1">({{ $tutor->reviews_count }})</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>{{ $tutor->hours_this_week }}h this week</span>
                            </div>
                        </div>
                        <div class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">
                            Free
                        </div>
                    </div>

                    <form method="POST" action="{{ route('tutors.request', $tutor) }}">
                        @csrf
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors flex items-center justify-center">
                            Request Tutor
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center py-12">
                    <p class="text-gray-500">No tutors found matching your criteria. Try adjusting your filters.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
