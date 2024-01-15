<div class="py-6">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-bold text-gray-900">
                            Patch Role Data
                        </h2>
                    </header>

                    <p class="mt-1 text-sm text-gray-500">
                        Update role data according to the ID that was previously passed.
                    </p>

                    <form action="{{ route('role.patch', $role->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-2 gap-5 my-4">

                            {{-- Role ID --}}
                            <div class="col-span-2">
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900">Role ID <span class="text-xs text-gray-600">(cannot be change)</label>
                                <input 
                                type="text" 
                                name="id" 
                                id="id" 
                                class="
                                bg-gray-100
                                border 
                                border-none 
                                text-gray-500
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
                                value="{{ old('id', $role->id) }}" 
                                disabled />
                            </div>
        
                            {{-- Status --}}
                            <div class="col-span-2">
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Select role status <span class="text-xs text-gray-600">(optional)</span></label>
                                <select 
                                id="status" 
                                name="status" 
                                class="
                                bg-gray-100
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
                                    <option selected disabled>Select status</option>
                                    <option value="inactive" @if($role->status->value === 'inactive' ) selected @endif>Inactive</option>
                                    <option value="active" @if($role->status->value === "active") selected @endif>Active</option>
                                </select>
                            </div>
        
                            {{-- Title --}}
                            <div class="col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-xs text-gray-600">(optional)</span></label>
                                <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                class="
                                bg-gray-100
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
                                value="{{ old('title', $role->title) }}"
                                placeholder="Title" 
                                required />
                                
                                @error('title')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
        
                            {{-- Description --}}
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description <span class="text-xs text-gray-600">(optional)</span></label>
                                <textarea 
                                type="text" 
                                name="description" 
                                id="description" 
                                class="
                                bg-gray-100
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
                                required>{{ old('description', $role->description) }}</textarea>
                                
                                @error('description')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
        
                            {{-- Abilities --}}
                            <div class="col-span-2">
                                <p class="block mb-2 text-sm font-medium text-gray-900">Abilities <span class="text-xs text-gray-600">(optional)</span></p>
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
                                            @if(str_contains($role->abilities, 'create')) checked @endif
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
                                            @if(str_contains($role->abilities, 'view')) checked @endif
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
                                            @if(str_contains($role->abilities, 'edit')) checked @endif
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
                                            @if(str_contains($role->abilities, 'delete')) checked @endif
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
                            Patch role data
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>