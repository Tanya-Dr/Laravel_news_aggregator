<div class="nav-scroller py-1 mb-2 container" style="margin-top: 10px;">
    <nav class="nav d-flex justify-content-between">
        @foreach($categories as $category)
            <a class="p-2 link-secondary" href="{{ route('news.category', ['category' => $category]) }}" @if(request()->routeIs('news.category') && $news->category == $category) style="font-weight: bold;" @endif>
                {{ $category->title }}
            </a>
        @endforeach
    </nav>
</div>
