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
                                <div class="flex flex-row space-x-6 mt-6">
                                    <div>
                                        <input type="radio" name="color" id="dark" value="dark">
                                        <label for="dark"><span class="dark"></span></label>
                                    </div>
                                    <div>
                                        <input type="radio" name="color" id="light" value="light">
                                        <label for="light"><span class="light"></span></label>
                                    </div>
                                    <div>
                                        <input type="radio" name="color" id="blue-dark" value="blue-dark">
                                        <label for="blue-dark"><span class="blue-dark"></span></label>
                                    </div>
                                    <div>
                                        <input type="radio" name="color" id="purple-dark" value="purple-dark">
                                        <label for="purple-dark"><span class="purple-dark"></span></label>
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