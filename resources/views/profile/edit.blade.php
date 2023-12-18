<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- All library link in here --}}
    @include('layouts.head')
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-zinc-900">
        {{-- Navigation --}}
        @php
            $greetingWord = "";
            $recentTime = date("G");

            if ($recentTime > 0 && $recentTime < 24) {
                if ($recentTime >= 3 && $recentTime < 12) {
                    $greetingWord = "Good Morning";
                } else if ($recentTime >= 12 && $recentTime < 17) {
                    $greetingWord = "Good Afternoon";
                } else {
                    $greetingWord = "Good Evening";
                }
            } 
        @endphp
        <x-admin-navigation :greetingMessage="$greetingWord"/>
        {{-- Page Heading --}}
        <header class="bg-zinc-900">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div name="header">
                    <h2 class="font-bold text-2xl text-center text-yellow-400 leading-tight">
                        {{ __('Update Admin Data') }}
                    </h2>
                </div>
            </div>
        </header>
        {{-- Main Content --}}
        <div class="py-12">
            <div class="px-5 mx-auto space-y-6 md:px-8 md:max-w-7xl">
                <div class="p-4 sm:p-8 bg-yellow-400 rounded-md shadow-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-yellow-400 rounded-md shadow-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
                <div class="p-4 sm:p-8 bg-yellow-400 rounded-md shadow-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>