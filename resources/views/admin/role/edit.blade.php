@section('title')
    Edit Role
@endsection

@section('description')
    edit role page is the main page to update (patch) the role model data.
@endsection

<x-app-layout>
    @section('header')
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Role') }}
            </h2>
        </div>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                @include('admin.role.section.form-edit')
            </div>
        </div>
    @endsection
</x-app-layout>