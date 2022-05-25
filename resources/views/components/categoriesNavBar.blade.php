<div class="nav-scroller py-1 mb-2 container">
    <nav class="nav d-flex justify-content-between">
        @foreach($categories as $category)
            <a class="p-2 link-secondary" href="{{ route('news.category', ['idCategory' => $category->id]) }}">{{ $category->title }}</a>
        @endforeach
    </nav>
</div>
