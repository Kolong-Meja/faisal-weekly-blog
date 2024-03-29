<div class="py-6">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-bold text-gray-900">
                            Patch User Data
                        </h2>
                    </header>

                    <p class="mt-1 text-sm text-gray-500">
                        Update user data according to the ID that was previously passed.
                    </p>

                    <form action="{{ route('user.patch', $user->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-2 gap-5 my-4">
                            {{-- User ID --}}
                            <div class="col-span-2">
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900">User ID <span class="text-xs text-gray-700">(cannot be change)</span></label>
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
                                value="{{ old('id', $user->id) }}" 
                                disabled />
                            </div>

                            {{-- Select Role --}}
                            <div class="col-span-2">
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Select user role <span class="text-xs text-gray-700">(optional)</span></label>
                                <select 
                                id="role" 
                                name="role" 
                                class="
                                bg-gray-100
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
                                    <option selected disabled>Select role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @if($user->role->id === $role->id) selected @endif>{{ $role->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Username --}}
                            <div class="col-span-2">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username <span class="text-xs text-gray-700">(optional)</span></label>
                                <input 
                                type="text" 
                                name="username" 
                                id="username"
                                class="
                                bg-gray-100
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
                                value="{{ old('username', $user->username) }}"
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
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Fullname <span class="text-xs text-gray-700">(optional)</span></label>
                                <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="
                                bg-gray-100
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
                                value="{{ old('name', $user->name) }}"
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
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email <span class="text-xs text-gray-700">(optional)</span></label>
                                <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="
                                bg-gray-100
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
                                value="{{ old('email', $user->email) }}"
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
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password <span class="text-xs text-gray-700">(optional)</span></label>
                                <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="
                                bg-gray-100
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
                            Patch user data
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>