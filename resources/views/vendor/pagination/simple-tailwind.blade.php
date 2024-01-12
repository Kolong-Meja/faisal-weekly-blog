@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center py-3">
        {{-- Previous Page Link --}}
        <div class="px-2">
            @if ($paginator->onFirstPage())
                <span 
                class="
                relative 
                inline-flex 
                items-center 
                px-4 
                py-2 
                text-sm 
                font-medium 
                text-gray-300 
                bg-red-400
                border-none
                cursor-default 
                leading-5 
                rounded-md
                "
                >
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a 
                href="{{ $paginator->previousPageUrl() }}" 
                rel="prev" 
                title="Previous Page"
                class="
                relative 
                inline-flex 
                items-center 
                px-4 
                py-2 
                text-sm 
                font-medium 
                text-white 
                bg-red-500 
                border 
                border-none 
                leading-5 
                rounded-md 
                hover:bg-red-600
                hover:text-gray-200 
                focus:outline-none 
                focus:ring 
                ring-red-400 
                focus:border-red-600 
                active:bg-red-600 
                active:text-gray-200 
                transition 
                ease-in-out 
                duration-300
                "
                >
                    {!! __('pagination.previous') !!}
                </a>
            @endif
        </div>

        {{-- Next Page Link --}}
        <div>
            @if ($paginator->hasMorePages())
                <a 
                href="{{ $paginator->nextPageUrl() }}" 
                rel="next"
                title="Next Page" 
                class="
                relative 
                inline-flex 
                items-center 
                px-4 
                py-2 
                text-sm 
                font-medium 
                text-gray-100 
                bg-green-500
                border 
                border-none 
                leading-5 
                rounded-md 
                hover:bg-green-600
                hover:text-gray-200 
                focus:outline-none 
                focus:ring 
                ring-green-300 
                focus:border-green-400 
                active:bg-green-400 
                active:text-gray-700 
                transition 
                ease-in-out 
                duration-300
                "
                >
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span 
                class="
                relative 
                inline-flex 
                items-center 
                px-4 
                py-2 
                text-sm 
                font-medium 
                text-gray-200 
                bg-green-400
                border 
                border-none
                cursor-default 
                leading-5 
                rounded-md
                "
                >
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif