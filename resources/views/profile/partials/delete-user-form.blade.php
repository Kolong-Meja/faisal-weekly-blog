<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-md text-gray-900">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <button type="submit" data-modal-target="delete__account__modal" data-modal-toggle="delete__account__modal" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-300">
        Delete Account
    </button>
    {{-- Need to be fixed! --}}
    <div id="delete__account__modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-yellow-400 rounded-lg shadow-lg">
                <button type="button" class="absolute top-3 end-2.5 text-gray-900 bg-transparent hover:bg-zinc-900 hover:text-yellow-400 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete__account__modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-900 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-semibold text-gray-900">Are you sure you want to delete this account?</h3>
                    <p class="my-2 text-base text-gray-900">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="mt-6">
                            <input type="password" id="current-password" name="current-password" placeholder="{{ __('Password') }}" class="mt-1 block w-full text-gray-50 rounded-md bg-gray-600 border-none focus:border-none focus:ring-0" required>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button data-modal-hide="delete__account__modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button type="button" data-modal-hide="delete__account__modal" class="text-gray-900 bg-green-500 hover:bg-green-600 focus:ring-0 focus:outline-none focus:ring-none rounded-lg border border-none text-sm font-medium px-5 py-2.5 focus:z-10">
                                No, cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>