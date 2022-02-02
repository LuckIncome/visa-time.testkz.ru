@if ($paginator->hasPages())
<ul class="paginat">
      @if ($paginator->onFirstPage())
            <li><a class="text-main"><div class="slider-arrow slider-arrow-left"><i class="bi bi-chevron-left"></i></div></a></li>
      @else
            <li><a class="text-main" href="{{ $paginator->previousPageUrl() }}"><div class="slider-arrow slider-arrow-left"><i class="bi bi-chevron-left"></i></div></a></li>
      @endif 
      @foreach ($elements as $element)         
            @if (is_array($element))
                  @foreach ($element as $page => $url)
                  @if ($paginator->currentPage() > 4 && $page === 2)
                        ...
                  @endif
                  @if ($page == $paginator->currentPage()) 
                        <li><a class="text-main active" href="{{ $url }}">{{ $page }}</a></li>
                  @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)
                        <li><a class="text-main" href="{{ $url }}">{{ $page }}</a></li>
                  @endif                                                                                      
                  @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)
                        ...
                  @endif 
                  @endforeach
            @endif
      @endforeach
      @if ($paginator->hasMorePages())
            <li><a class="text-main" href="{{ $paginator->nextPageUrl() }}"><div class="slider-arrow slider-arrow-right"><i class="bi bi-chevron-right"></i></div></a></li>
      @else
            <li><a class="text-main"><div class="slider-arrow slider-arrow-right"><i class="bi bi-chevron-right"></i></div></a></li>
      @endif      
</ul>
@endif