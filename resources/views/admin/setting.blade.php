@section('title')
    Setting
@endsection

@section('description')
    Is a page that is useful for setting the admin appearance according to the user's wishes.
@endsection

<x-app-layout>
    @section('header')
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Setting') }}
            </h2>
        </div>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Change Theme
                                </h2>
                                <p class="mt-1 text-sm text-gray-600">
                                    You can choose the background theme color that you like.
                                </p>
                                <div class="flex flex-row space-x-6 mt-6" id="radio-color-picker">
                                    <div class="flex items-center">
                                        <input id="default" type="radio" value="default" name="color" class="w-4 h-4 text-blue-500 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="default" class="ms-2 text-sm font-medium text-gray-900">Default</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="dark" type="radio" value="dark" name="color" class="w-4 h-4 text-gray-950 bg-gray-100 border-gray-300 focus:ring-gray-950 focus:ring-2">
                                        <label for="dark" class="ms-2 text-sm font-medium text-gray-900">Dark</label>
                                    </div>
                                </div>
                            </header>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>