@section('title')
    Feedbacks
@endsection

@section('description')
    Feedback page is the main page to display the feedbacks table.
@endsection

<x-app-layout>
    @section('header')
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Feedbacks Table') }}
            </h2>
        </div>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                @include('admin.feedback.section.table')
            </div>
        </div>
    @endsection
</x-app-layout>