@section('title')
    Articles
@endsection

@section('description')
    Article page is the main page to display the articles table.
@endsection

<x-app-layout>
    @section('header')
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles Table') }}
            </h2>
        </div>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                @include('admin.article.section.table')
            </div>
        </div>
    @endsection
</x-app-layout>