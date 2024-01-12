<div id="update-role-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden min-h-screen fixed top-0 right-0 left-0 z-50 bg-gray-800/50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)]">
    <div class="relative p-4 w-full max-w-md max-h-full">
        
        <!-- Modal content -->
        <div class="relative bg-gray-100 rounded-lg shadow-md">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900">
                    Update Role Data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="update-role-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('role.update') }}" method="POST" autocomplete="on">
                @csrf
                @method('PUT')
                
                <div class="grid gap-4 mb-4 grid-cols-2">

                    {{-- Role ID --}}
                    <div class="col-span-2">
                        <label for="id" class="block mb-2 text-sm font-medium text-gray-900">Role ID <span class="text-xs text-gray-700">(required)</label>
                        <input 
                        type="text" 
                        name="id" 
                        id="id" 
                        class="
                        bg-gray-200
                        border 
                        border-none 
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg
                        focus:ring-2
                        focus:ring-green-400
                        focus:border-green-500 
                        block 
                        p-2.5  
                        w-full 
                        "
                        placeholder="Role ID should be exist" 
                        required />
                    </div>

                    {{-- Status --}}
                    <div class="col-span-2">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Select role status <span class="text-xs text-gray-700">(required)</span></label>
                        <select 
                        id="status" 
                        name="status" 
                        class="
                        bg-gray-200
                        border 
                        border-none 
                        text-gray-900
                        text-sm 
                        rounded-lg 
                        focus:ring-2
                        focus:ring-green-500 
                        focus:border-green-500 
                        block 
                        w-full 
                        p-2.5 
                        "
                        >
                            <option selected>Select status</option>
                            <option value="inactive">Inactive</option>
                            <option value="active">Active</option>
                        </select>
                    </div>

                    {{-- Title --}}
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
                        focus:ring-2
                        focus:ring-green-400
                        focus:border-green-500 
                        block 
                        p-2.5  
                        w-full 
                        @error('title')
                        is-invalid
                        @enderror
                        "
                        placeholder="Title" 
                        required />
                        
                        @error('title')
                            <div class="text-sm text-red-600 space-y-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Description --}}
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
                        @error('description')
                        is-invalid
                        @enderror
                        "
                        placeholder="Description" 
                        required></textarea>
                        
                        @error('description')
                            <div class="text-sm text-red-600 space-y-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Abilities --}}
                    <div class="col-span-2">
                        <p class="block mb-2 text-sm font-medium text-gray-900">Abilities <span class="text-xs text-gray-700">(required)</span></p>
                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-gray-100 border border-gray-200 rounded-lg sm:flex">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
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
                                    <label for="abilities" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Create</label>
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
                                    <label for="react-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">View</label>
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
                                    <label for="angular-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Edit</label>
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
                                    <label for="laravel-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Delete</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Submit Button --}}
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cloud-arrow-up-fill me-1 -ms-1 w-5 h-5" viewBox="0 0 16 16">
                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    Update recent role
                </button>
            </form>
        </div>
    </div>
</div> 