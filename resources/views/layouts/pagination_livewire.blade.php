@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        @if ($paginator->onFirstPage())
            <span class="pagination-previous">
                <i class="fas fa-chevron-left"></i>
            </span>
        @else
            <a href="#" class="pagination-previous" wire:click="setPage('{{ $paginator->previousPageUrl() }}')">
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="#" class="pagination-next" wire:click="setPage('{{ $paginator->nextPageUrl() }}')">
                <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span class="pagination-next">
                <i class="fas fa-chevron-right"></i>
            </span>
        @endif

        <ul class="pagination-list">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="pagination-ellipsis">&hellip;</span>
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a class="pagination-link is-current">
                                    {{ $page }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="#" class="pagination-link" wire:click="setPage('{{ $url }}')">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
