<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="min-h-screen bg-[#F9FAFB] font-sans text-[#111827] antialiased" x-data="{ sidebarOpen: false, profileOpen: false }">
        <div class="relative flex min-h-screen flex-col">
            <div class="fixed inset-0 z-30 bg-[#111827]/40 md:hidden" x-cloak x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"></div>

            <div class="flex flex-1 overflow-hidden">
                @include('layouts.partials.sidebar')

                <div class="flex min-w-0 flex-1 flex-col h-screen overflow-y-auto md:ml-72">
                    @include('layouts.partials.header')


                    <main class="flex-1 bg-[#F9FAFB] px-4 py-6 sm:px-6 lg:px-10 lg:py-10">
                        <div class="mx-auto w-full max-w-7xl">
                            @isset($slot)
                                {{ $slot }}
                            @else
                                @yield('content')
                            @endisset
                        </div>
                    </main>

                    @include('layouts.partials.footer')
                </div>
            </div>
        </div>
    </body>
</html>
