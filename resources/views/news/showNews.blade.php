@extends('layouts.main')
@section('title') - {{ $news['title'] }} @parent @stop

@section('content')
<div class="row g-5">
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">{{ $categoryName['title'] }}</h3>
        <article class="blog-post">
            <h2 class="blog-post-title">{{ $news['title'] }}</h2>
            <p class="blog-post-meta">{{ $news['created_at'] }}</p>

            <p>{{ $news['description'] }}</p>
        </article>
    </div>
    <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" style="width: 100%;">
        </div>
    </div>
    <a class="p-2 link-secondary" href="{{ route('news.category', ['idCategory' => $categoryName['id']]) }}">Back to category</a>
</div>

@endsection

