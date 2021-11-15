@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
{{--            <li class="disabled"><span>&laquo;</span></li>--}}
            <a href="#" class="prevposts-link disabled"><i class="fa fa-caret-left"></i></a>

        @else
{{--            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"></a></li>--}}
            <a href="{{ $paginator->previousPageUrl() }}" class="prevposts-link">&laquo;</a>

        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
{{--                <li class="disabled"><span>{{ $element }}</span></li>--}}
                <a href="#" class="blog-page transition disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
{{--                        <li class="active"><span>{{ $page }}</span></li>--}}
                        <a href="#" class="blog-page current-page transition">{{ $page }}</a>
                    @else
{{--                        <a href="{{ $url }}">{{ $page }}</a>--}}
                        <a href="{{ $url }}" class="blog-page transition">{{ $page }}</a>

                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
{{--            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>--}}
            <a href="{{ $paginator->nextPageUrl() }}" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
        @else
{{--            <li class="disabled"><span>&raquo;</span></li>--}}
            <a href="#" class="nextposts-link disabled"><i class="fa fa-caret-right"></i></a>
        @endif
    </ul>
@endif
