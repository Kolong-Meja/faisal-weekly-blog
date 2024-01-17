@section('title')
    Edit Article
@endsection

@section('description')
    edit article page is the main page to update (patch) the article model data.
@endsection

<x-app-layout>
    @section('header')
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Article Form') }}
            </h2>
        </div>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                @include('admin.article.section.form-edit')
            </div>
        </div>
    @endsection
</x-app-layout>