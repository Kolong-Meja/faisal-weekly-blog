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

                            {{-- Role --}}
                            <div class="col-span-2">
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Select user role <span class="text-xs text-gray-700">(optional)</span></label>
                                <select 
                                id="role" 
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
                                            <option value="{{ $role->id }}" @if($user->role->id === $role->id) selected @endif>{{ $role->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{-- Username --}}
                            <div class="col-span-2">
                                <label for="username-update" class="block mb-2 text-sm font-medium text-gray-900">Username <span class="text-xs text-gray-700">(optional)</span></label>
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
                                <label for="name-update" class="block mb-2 text-sm font-medium text-gray-900">Fullname <span class="text-xs text-gray-700">(optional)</span></label>
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
                                <label for="email-update" class="block mb-2 text-sm font-medium text-gray-900">Email <span class="text-xs text-gray-700">(optional)</span></label>
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
                                <label for="password-update" class="block mb-2 text-sm font-medium text-gray-900">Password <span class="text-xs text-gray-700">(optional)</span></label>
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
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>