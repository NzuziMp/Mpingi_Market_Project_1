@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination pagination_s pagination_ paginations_ paginations__ pagination_pi pagination_ap justify-content-end">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" id="ahrefpagination">← Previous</a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" id="ahrefpagination">← Previous</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link" id="ahrefpagination" style="z-index:0">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}" id="ahrefpagination">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#">Next →</a>
            </li>
        @endif
    </ul>
@endif
