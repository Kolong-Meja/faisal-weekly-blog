<div id="update-user-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden min-h-screen fixed top-0 right-0 left-0 z-50 bg-gray-800/50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)]">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        
        <!-- Modal content -->
        <div class="relative bg-gray-100 rounded-lg shadow-md">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Update Admin Data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="update-user-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('user.update') }}" method="POST" autocomplete="on">
                @csrf
                @method('PUT')
                
                <div class="grid gap-4 mb-4 grid-cols-2">

                    {{-- User ID --}}
                    <div class="col-span-2">
                        <label for="id-update" class="block mb-2 text-sm font-medium text-gray-900">User ID <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="text" 
                        name="id" 
                        id="id-update" 
                        class="
                        bg-gray-200
                        border-none
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-green-400
                        focus:border-green-400 
                        block 
                        w-full 
                        p-2.5  
                        "
                        placeholder="ID should be exist" 
                        required />

                        @error('id')
                            <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="col-span-2">
                        <label for="role-update" class="block mb-2 text-sm font-medium text-gray-900">Select user role <span class="text-xs text-gray-700">(required)</span></label>
                        <select 
                        id="role-update" 
                        name="role" 
                        class="
                        bg-gray-200
                        border-none
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-green-400
                        focus:border-green-400 
                        block 
                        w-full 
                        p-2.5  
                        "
                        >
                            <option selected>Select role</option>
                            @foreach ($roles as $role)
                                @if ($role->status === "active")
                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Username --}}
                    <div class="col-span-2">
                        <label for="username-update" class="block mb-2 text-sm font-medium text-gray-900">Username <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="text" 
                        name="username" 
                        id="username-update" 
                        class="
                        bg-gray-200
                        border-none
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-green-400
                        focus:border-green-400 
                        block 
                        w-full 
                        p-2.5    
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
                        <label for="name-update" class="block mb-2 text-sm font-medium text-gray-900">Fullname <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="text" 
                        name="name" 
                        id="name-update" 
                        class="
                        bg-gray-200
                        border-none
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-green-400
                        focus:border-green-400 
                        block 
                        w-full 
                        p-2.5  
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
                        <label for="email-update" class="block mb-2 text-sm font-medium text-gray-900">Email <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="email" 
                        name="email" 
                        id="email-update" 
                        class="
                        bg-gray-200
                        border-none
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-green-400
                        focus:border-green-400 
                        block 
                        w-full 
                        p-2.5   
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
                        <label for="password-update" class="block mb-2 text-sm font-medium text-gray-900">Password <span class="text-xs text-gray-700">(required)</span></label>
                        <input 
                        type="password" 
                        name="password" 
                        id="password-update" 
                        class="
                        bg-gray-200
                        border-none
                        text-gray-900 
                        placeholder-gray-400
                        text-sm 
                        rounded-lg 
                        focus:ring-green-400
                        focus:border-green-400 
                        block 
                        w-full 
                        p-2.5   
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cloud-arrow-up-fill me-1 -ms-1 w-5 h-5" viewBox="0 0 16 16">
                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    Update recent admin
                </button>
            </form>
        </div>
    </div>
</div> 