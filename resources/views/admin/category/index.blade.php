@section('title')
    Categories
@endsection

@section('description')
    Category page is the main page to display the categories table.
@endsection

<x-app-layout>
    @section('header')
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories Table') }}
            </h2>
        </div>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                @include('admin.category.section.table')
            </div>
        </div>
    @endsection
</x-app-layout>