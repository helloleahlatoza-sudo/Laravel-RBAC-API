<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'OSCA Portal - Barangay Anomar')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-800">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        
        <!-- Left Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            
            <!-- Topbar -->
            @include('layouts.topbar')

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                    {{ $slot ?? '' }}
                </div>
            </main>

        </div>
    </div>

</body>
</html>