<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TutorConnect - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bgMain">
<!-- Header -->
<header class="bg-box text-textMain shadow-lg">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">
                <a href="{{ route('home') }}">TutorConnect</a>
            </h1>
            <nav class="hidden md:flex items-center space-x-4">
                <a href="{{ route('tutors.find') }}" class="text-accentText hover:underline">Find Tutor</a>
                <a href="{{ route('tutors.apply') }}" class="text-accentText hover:underline">Become Tutor</a>
                <a href="{{ route('profile') }}" class="block">
                    <div class="w-10 h-10 bg-accent rounded-full flex items-center justify-center text-white font-bold hover:ring-2 hover:ring-accentText transition-all">
                        AJ
                    </div>
                </a>
            </nav>
            <button id="mobile-menu-btn" class="md:hidden p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden bg-box shadow-lg border-b md:hidden">
    <div class="px-4 py-2">
        <a href="{{ route('tutors.find') }}" class="text-accentText block py-3 px-4 rounded hover:bg-gray-100">Find a
            Tutor</a>
        <a href="{{ route('tutors.apply') }}" class="text-accentText block py-3 px-4 rounded hover:bg-gray-100">Become a
            Tutor</a>
        <a href="{{ route('profile') }}" class="text-accentText block py-3 px-4 rounded hover:bg-gray-100">Profile</a>
    </div>
</div>

<!-- Main Content -->
<main class="container mx-auto px-4 py-6">
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
