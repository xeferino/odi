@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="javascript:void(0)">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
            </li>
        @else
            <li class="disabled">
                <a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
            </li>
        @endif
    </ul>
@endif