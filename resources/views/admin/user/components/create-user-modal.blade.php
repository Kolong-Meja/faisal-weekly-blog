<div id="create-user-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden min-h-screen fixed top-0 right-0 left-0 z-50 bg-gray-800/50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)]">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        
        <!-- Modal content -->
        <div class="relative bg-gray-100 rounded-lg shadow-md">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create New Admin
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-800 hover:text-gray-100 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="create-user-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('user.store') }}" method="POST" autocomplete="on">
                @csrf
                @method('POST')
                
                <div class="grid gap-4 mb-4 grid-cols-2">

                    {{-- Role --}}
                    <div class="col-span-2">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Select role <span class="text-xs text-gray-700">(required)</span></label>
                        <select 
                        id="role" 
                        name="role" 
                        class="
                        bg-gray-200
                        border 
                        border-none 
                        text-gray-900
                        text-sm 
                        rounded-lg 
                        focus:ring-2
                        focus:ring-green-400 
                        focus:border-green-400 
                        block 
                        w-full 
                        p-2.5 
                        "
                        >
                            <option selected>Select Role</option>
                            @foreach ($roles as $role)
                                @if ($role->status === "active")
                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Username --}}
                    <div class="col-span-2">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        class="
                        bg-gray-200
                        border-none 
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-2
                        focus:ring-green-400
                        focus:border-green-400
                        block 
                        p-2.5  
                        w-full 
                        "
                        autocomplete="username"
                        placeholder="Username" 
                        required />

                        @error('username')
                            <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Fullname --}}
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Fullname <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="
                        bg-gray-200
                        border-none 
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-2
                        focus:ring-green-400
                        focus:border-green-400
                        block 
                        p-2.5  
                        w-full   
                        "
                        autocomplete="name"
                        placeholder="Fullname" 
                        required />

                        @error('name')
                            <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="
                        bg-gray-200
                        border-none 
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-2
                        focus:ring-green-400
                        focus:border-green-400
                        block 
                        p-2.5  
                        w-full 
                        "
                        autocomplete="email"
                        placeholder="Email" 
                        required />

                        @error('email')
                            <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    {{-- Password --}}
                    <div class="col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="
                        bg-gray-200
                        border-none 
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-2
                        focus:ring-green-400
                        focus:border-green-400
                        block 
                        p-2.5  
                        w-full  
                        "
                        placeholder="******" 
                        required
                        autocomplete="new-password" 
                        />

                        @error('password')
                            <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Confirmation Password --}}
                    <div class="col-span-2">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Password Confirmation <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="
                        bg-gray-200
                        border-none 
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-2
                        focus:ring-green-400
                        focus:border-green-400
                        block 
                        p-2.5  
                        w-full 
                        "
                        placeholder="******" 
                        required
                        autocomplete="new-password" 
                        />
                    </div> 
                </div>

                {{-- Submit --}}
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
                focus:ring-green-400 
                transition-colors
                duration-200
                ease-in-out
                "
                >
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new admin
                </button>
            </form>
        </div>
    </div>
</div> 