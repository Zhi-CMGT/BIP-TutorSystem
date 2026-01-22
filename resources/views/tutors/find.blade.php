@extends('layouts.app')

@section('title', 'Find a Tutor')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-12">
        <form method="GET" action="{{ route('tutors.find') }}" class="flex gap-2 mb-8">
            <div class="relative flex-grow">
                <select name="subject_id"
                        onchange="this.form.submit()"
                        class="w-full bg-box text-textMain border-none rounded-md py-3 px-4 appearance-none focus:ring-1 focus:ring-accent cursor-pointer">
                    <option value="">All Subjects</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $selectedSubject == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-textMain">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                    </svg>
                </div>
            </div>
            <button type="submit" class="bg-box p-3 rounded-md hover:opacity-80 transition-opacity">
                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </form>

        <div class="bg-box/50 rounded-lg p-4 mb-8 text-center border border-white/5">
            <p class="text-textMain text-sm">
                <span class="text-accent font-bold">100% Free:</span>
                All tutoring sessions are provided at no cost through government funding.
            </p>
        </div>

        <div class="bg-box/40 rounded-xl overflow-hidden shadow-2xl border border-white/5">
            @forelse($tutors as $tutor)
                <form id="request-form-{{ $tutor->id }}" method="POST" action="{{ route('tutors.request', $tutor) }}">
                    @csrf
                    <div onclick="document.getElementById('request-form-{{ $tutor->id }}').submit();"
                         class="flex items-center justify-between p-6 {{ !$loop->last ? 'border-b border-white/10' : '' }} hover:bg-box/60 transition-colors cursor-pointer group">

                        <div class="flex items-center space-x-5">
                            <div
                                class="w-12 h-12 rounded-full border-2 border-accent flex items-center justify-center group-hover:bg-accent/10 transition-colors">
                                <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-textMain font-bold text-lg leading-tight">{{ $tutor->name }}</h3>
                                <p class="text-accentText/70 text-sm italic">{{ $tutor->subject->name }}</p>
                            </div>
                        </div>

                        <div>
                        <span
                            class="bg-bgMain/50 text-accentText text-xs font-semibold px-4 py-1.5 rounded uppercase tracking-wider group-hover:bg-bgMain transition-colors">
                            {{ $tutor->level->name }}
                        </span>
                        </div>
                    </div>
                </form>
            @empty
                <div class="text-center py-12 text-accentText">
                    <p>No tutors found matching your criteria.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-6 text-center">
            <p class="text-accentText/60 text-sm">{{ $tutors->count() }} tutors available</p>
        </div>
    </div>
@endsection
