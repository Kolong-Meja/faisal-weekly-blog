@section('title')
    Roles
@endsection

@section('description')
    Role page is the main page to display the roles table.
@endsection

<x-app-layout>
    @section('header')
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles Table') }}
            </h2>
        </div>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                @include('admin.role.section.table')
            </div>
        </div>
    @endsection
</x-app-layout>