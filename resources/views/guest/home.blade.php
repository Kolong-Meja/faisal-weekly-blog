<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Head component --}}
    @include('head')
</head>
<body>
    <div class="home__main__section">
        {{-- Navigation --}}
        @include('layouts.guest-navigation')

        {{-- Float Button --}}
        @include('guest.parts.float-button')

        {{-- Hidden Feedback Success Modal --}}
        @include('guest.parts.feedback-success-modal')

        {{-- Hidden Feedback Error Modal --}}
        @include('guest.parts.feedback-error-modal')

        {{-- Header --}}
        @include('guest.sections.header')

        {{-- Blog Section --}}
        @include('guest.sections.blog')

        {{-- Footer Section --}}
        @include('guest.sections.footer')
    </div>
    {{-- Navigation Transition --}}
    <script src="{{ asset('js/navbar-transition.js') }}"></script>

    {{-- Feedback Store Ajax --}}
    <script src="{{ asset('js/feedback-ajax.js') }}"></script>
</body>
</html>