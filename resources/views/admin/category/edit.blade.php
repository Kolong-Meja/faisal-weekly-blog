@section('title')
    Edit Category
@endsection

@section('description')
    edit category page is the main page to update (patch) the category model data.
@endsection

<x-app-layout>
    @section('header')
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Category Form') }}
            </h2>
        </div>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                @include('admin.category.section.form-edit')
            </div>
        </div>
    @endsection
</x-app-layout>