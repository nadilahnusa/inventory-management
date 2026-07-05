<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#F9FAFB] font-sans text-[#111827] antialiased">
        <div class="flex min-h-screen items-center justify-center px-4 py-10">
            <div class="w-full max-w-md rounded-2xl border border-[#E5E7EB] bg-white p-8 shadow-sm">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
