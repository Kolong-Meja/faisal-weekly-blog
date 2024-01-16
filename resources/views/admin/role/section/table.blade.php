{{-- Session Message --}}
<div x-data="{ showMessage:true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    @if (session()->has("success"))
        <x-success-session />
    @elseif (session()->has("error"))
        <x-error-session />
    @elseif (session()->has('not found'))
        <x-not-found-session /> 
    @endif
</div>

<div class="bg-white overflow-hidden sm:rounded-lg shadow-md">                           
    <div class="p-6 text-gray-100">
        
        {{-- Actions --}}
        <div class="flex flex-row items-center space-x-4 mb-2">

            {{-- Search Bar --}}
            <form autocomplete="on" action="{{ route('role.index') }}" method="GET" id="roleSearchForm">
                <div class="p-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input 
                        type="search" 
                        id="roleSearch" 
                        name="search" 
                        class="
                        block 
                        w-full 
                        p-2 
                        ps-10 
                        text-sm 
                        text-gray-900
                        border-none
                        rounded-lg 
                        placeholder-gray-400
                        bg-gray-200 
                        focus:ring-2
                        focus:ring-blue-300
                        focus:border-blue-400
                        " 
                        placeholder="Search ID, title, status..."
                        />
                    </div>
                </div> 
            </form>

            {{-- Menu --}}
            <button 
            type="button"
            id="dropdownDefaultButton"
            name="menu"
            class="
            text-gray-900
            inline-flex
            items-center
            "
            data-dropdown-toggle="dropdown"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list me-2 w-5 h-5" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                </svg>
                Menu
            </button>
                
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg border border-gray-200 shadow-xl w-64">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                    <li>
                        @if (Auth::check() && str_contains(Auth::user()->role->abilities, 'create'))
                            <a 
                            class="
                            block 
                            px-4 
                            py-2 
                            hover:bg-gray-200
                            transition-colors
                            duration-200
                            ease-in-out
                            cursor-pointer
                            "
                            data-modal-target="create-role-modal" 
                            data-modal-toggle="create-role-modal"
                            >Create new role <span class="text-xs">(Allowed)</a>
                        @else
                            <a 
                            class="
                            block 
                            px-4 
                            py-2 
                            pointer-events-none 
                            opacity-50 
                            cursor-not-allowed
                            "
                            data-modal-target="create-role-modal" 
                            data-modal-toggle="create-role-modal"
                            >Create new role <span class="text-xs">(Not Allowed)</a>
                        @endif
                    </li>
                    <li>
                        @if (Auth::check() && str_contains(Auth::user()->role->abilities, 'edit'))
                             <a 
                            class="
                            block 
                            px-4 
                            py-2 
                            hover:bg-gray-200
                            transition-colors
                            duration-200
                            ease-in-out
                            cursor-pointer
                            "
                            data-modal-target="update-role-modal" 
                            data-modal-toggle="update-role-modal"
                            >Update specific role <span class="text-xs">(Allowed)</a>
                        @else
                            <a 
                            class="
                            block 
                            px-4 
                            py-2 
                            pointer-events-none 
                            opacity-50 
                            cursor-not-allowed
                            "
                            data-modal-target="update-role-modal" 
                            data-modal-toggle="update-role-modal"
                            >Update specific role <span class="text-xs">(Not Allowed)</span></a>
                        @endif
                    </li>
                </ul>
            </div>
            
            {{-- Refresh Button --}}
            <button 
            type="button"
            id="buttonRefresh"
            name="refresh"
            class="
            text-gray-900
            "
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                </svg>
            </button>
        </div>
        
        {{-- Create Modal --}}
        @include('admin.role.components.create-role-modal')
        
        {{-- Update Modal --}}
        @include('admin.role.components.update-role-modal')

        {{-- Table --}}
        <div class="overflow-x-auto w-max-full">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-sm text-gray-900 uppercase bg-gray-300">
                    @if ($roles->isEmpty())
                        <div class="flex items-center justify-center py-4">
                            <p class="font-serif text-lg text-gray-500">No role's found.</p>
                        </div>
                    @else
                        <tr>
                            <th scope="col" class="whitespace-nowrap px-6 py-3">ID</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3">Title</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3">Description</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3">Abilities</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3">Status</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3">Modified At</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3">Actions</th>
                        </tr>
                    @endif
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr 
                        class="
                        bg-gray-100
                        border-b 
                        text-gray-900
                        text-sm
                        border-gray-200
                        hover:text-gray-900
                        hover:bg-gray-200
                        transition-colors
                        duration-200
                        ease-in-out
                        "
                        >
                            <td class="whitespace-nowrap px-6 py-4">
                                <span class="font-semibold">{{ $role->id }}</span>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $role->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $role->description }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $role->abilities }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                @if ($role->status !== 'active')
                                   <x-object-status bg-color="bg-red-500" ping-color="bg-red-300" dot-color="bg-red-300" :status="$role->status" />
                                @else
                                   <x-object-status bg-color="bg-green-500" ping-color="bg-green-300" dot-color="bg-green-300" :status="$role->status" />
                                @endif
                            </td>                                                  
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $role->updated_at }}
                            </td>
                            <td class="px-6 py-4">
                                <form onsubmit="return confirm('Are you sure to remove this role?');" action="{{ route('role.delete', $role->id) }}" method="POST">
                                    <div class="inline-flex gap-2" role="group">
                                        @if (Auth::check() && str_contains(Auth::user()->role->abilities, 'edit'))
                                            <a href="{{ route('role.edit', $role->id) }}">
                                                <button 
                                                type="button" 
                                                class="
                                                px-4 
                                                py-2 
                                                text-sm 
                                                font-medium 
                                                rounded-md 
                                                text-white 
                                                bg-blue-500 
                                                hover:bg-blue-600 
                                                hover:text-gray-200 
                                                transition-colors 
                                                duration-300 
                                                ease-in-out 
                                                focus:z-10 
                                                focus:ring-2 
                                                focus:ring-blue-700 
                                                focus:text-white">
                                                Patch
                                                </button>
                                            </a>
                                        @else
                                            <button 
                                            type="button"
                                            class="
                                            px-4 
                                            py-2 
                                            text-sm 
                                            font-medium 
                                            rounded-md 
                                            text-white 
                                            bg-blue-500 
                                            pointer-events-none 
                                            opacity-50 
                                            cursor-not-allowed
                                            " 
                                            disabled
                                            >
                                                Patch
                                            </button>
                                        @endif

                                        @csrf
                                        @method('DELETE')
                                        
                                        @if (Auth::check() && str_contains(Auth::user()->role->abilities, 'delete'))
                                            <button type="submit" class="px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 hover:text-gray-900 transition-colors duration-300 ease-in-out focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-white">
                                                Delete
                                            </button>
                                        @else
                                            <button type="submit" class="px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500  pointer-events-none opacity-50 cursor-not-allowed" disabled>
                                                Delete
                                            </button>
                                        @endif
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $roles->links('vendor.pagination.simple-tailwind') }}
    </div>
</div>