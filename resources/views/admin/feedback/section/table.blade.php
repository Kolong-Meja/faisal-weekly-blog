{{-- Session Message --}}
<div x-data="{ showMessage:true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    @if (session()->has("success"))
        <x-success-session />
    @elseif (session()->has("error"))
        <x-error-session />
    @endif
</div>

<div class="bg-gray-100 overflow-hidden sm:rounded-lg">                           
    <div class="p-6 text-gray-100">
        
        {{-- Actions --}}
        <div class="flex flex-row items-center space-x-4 mb-2">

            {{-- Search Bar --}}
            <form autocomplete="on" action="{{ route('feedback.index') }}" method="GET" id="feedbackSearchForm">
                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input 
                        type="search" 
                        id="feedbackSearch" 
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
                        focus:ring-blue-300
                        focus:border-blue-300
                        " 
                        placeholder="Search ID, name, email..."
                        />
                    </div>
                </div> 
            </form>

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
        @include('admin.feedback.components.create-feedback-modal')
        
        {{-- Update Modal --}}
        @include('admin.feedback.components.update-feedback-modal')

        {{-- Table --}}
        <div class="overflow-x-auto w-max-full">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-sm text-gray-900 uppercase bg-gray-300">
                    @if ($feedbacks->isEmpty())
                        <div class="flex items-center justify-center py-4">
                            <p class="font-serif text-lg text-gray-500">No feedback's found.</p>
                        </div>
                    @else
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Content</th>
                            <th scope="col" class="px-6 py-3">Modified At</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    @endif
                </thead>
                <tbody>
                    
                    {{-- Not Found Session Message --}}
                    @if (session()->has('not found'))
                        <div x-data="{ showMessage:true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                            <x-not-found-session /> 
                        </div>
                    @endif

                    @foreach ($feedbacks as $feedback)
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
                            <td class="px-6 py-4">
                                <span class="font-semibold">{{ $feedback->id }}</span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $feedback->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $feedback->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $feedback->content }}
                            </td>                                              
                            <td class="px-6 py-4">
                                {{ $feedback->updated_at }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="inline-flex shadow-sm gap-2" role="group">
                                    <a href="mailto:{{ $feedback->email }}">
                                        <button type="submit" class="px-4 py-2 text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 hover:text-gray-100 transition-colors duration-300 ease-in-out focus:z-10 focus:ring-2 focus:ring-green-600 focus:text-white">
                                            Reply
                                        </button>
                                    </a> 

                                    <form onsubmit="return confirm('Are you sure to remove this role?');" action="{{ route('feedback.delete', $feedback->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')                                      

                                        @if (Auth::check() && str_contains(Auth::user()->role->abilities, 'delete'))
                                            <button type="submit" class="px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 hover:text-gray-100 transition-colors duration-300 ease-in-out focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-white">
                                                Delete
                                            </button>
                                        @else
                                            <button type="submit" class="px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500  pointer-events-none opacity-50 cursor-not-allowed" disabled>
                                                Delete
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $feedbacks->links('vendor.pagination.simple-tailwind') }}
    </div>
</div>