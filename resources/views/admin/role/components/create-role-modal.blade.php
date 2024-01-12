<div id="create-role-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden min-h-screen fixed top-0 right-0 left-0 z-50 bg-gray-800/50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)]">
    <div class="relative p-4 w-full max-w-md max-h-full">
        
        <!-- Modal content -->
        <div class="relative bg-gray-100 rounded-lg shadow-md">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create New Role
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create-role-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('role.store') }}" method="POST" autocomplete="on">
                @csrf
                @method('POST')
                
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="
                        bg-gray-200
                        border 
                        border-none
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-green-400
                        focus:border-green-400 
                        block 
                        p-2.5  
                        w-full 
                        "
                        placeholder="Title" 
                        required />

                        @error('title')
                            <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description <span class="text-xs text-gray-700">(required)</span></label>
                        <textarea 
                        type="text" 
                        name="description" 
                        id="description" 
                        class="
                        bg-gray-200
                        border 
                        border-none
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-green-400
                        focus:border-green-400 
                        block 
                        p-2.5  
                        w-full 
                        "
                        placeholder="Description" 
                        required></textarea>
                        
                        @error('description')
                            <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <p class="block mb-2 text-sm font-medium text-gray-900">Abilities <span class="text-xs text-gray-700">(required)</span></p>
                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-gray-100 border border-gray-200 rounded-lg sm:flex">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input 
                                    id="abilities" 
                                    type="checkbox" 
                                    name="abilities[]" 
                                    value="create" 
                                    class="
                                    w-4 h-4 
                                    bg-gray-200 
                                    border-none 
                                    rounded 
                                    text-green-400 
                                    ring-offset-green-400
                                    focus:ring-2 
                                    focus:ring-green-400
                                    "
                                    >
                                    <label for="abilities" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Create</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input 
                                    id="react-checkbox-list" 
                                    type="checkbox" 
                                    name="abilities[]" 
                                    value="view" 
                                    class=" 
                                    w-4 h-4 
                                    bg-gray-200 
                                    border-none 
                                    rounded 
                                    text-green-400 
                                    ring-offset-green-400
                                    focus:ring-2 
                                    focus:ring-green-400 
                                    "
                                    >
                                    <label for="react-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">View</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input 
                                    id="angular-checkbox-list" 
                                    type="checkbox" 
                                    name="abilities[]" 
                                    value="edit" 
                                    class=" 
                                    w-4 h-4 
                                    bg-gray-200 
                                    border-none 
                                    rounded 
                                    text-green-400 
                                    ring-offset-green-400
                                    focus:ring-2 
                                    focus:ring-green-400
                                    "
                                    >
                                    <label for="angular-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Edit</label>
                                </div>
                            </li>
                            <li class="w-full dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input 
                                    id="laravel-checkbox-list" 
                                    type="checkbox" 
                                    name="abilities[]" 
                                    value="delete" 
                                    class=" 
                                    w-4 h-4 
                                    bg-gray-200 
                                    border-none 
                                    rounded 
                                    text-green-400 
                                    ring-offset-green-400
                                    focus:ring-2 
                                    focus:ring-green-400
                                    "
                                    >
                                    <label for="laravel-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">Delete</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <button 
                type="submit" 
                class="
                text-gray-100
                inline-flex 
                items-center 
                bg-green-400
                font-medium 
                rounded-lg 
                text-sm 
                px-5 py-2.5 
                text-center 
                hover:bg-green-500 
                hover:text-gray-200
                focus:ring-4 
                focus:outline-none 
                focus:ring-green-500 
                transition-colors
                duration-200
                ease-in-out
                "
                >
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new role
                </button>
            </form>
        </div>
    </div>
</div> 