@extends('layouts.main')
@section('title') - {{ $news->title }} @parent @stop

@section('content')
<div class="row g-5">
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">{{ $news->category->title }}</h3>
        <article class="blog-post" style="margin-bottom: 2rem;">
            <h2 class="blog-post-title">{{ $news->title }}</h2>
            <p class="blog-post-meta">{{ $news->pub_date }} by {{ $news->author }}</p>
            <div>{!! $news->description !!}</div>
            @if($news->link)
                <p class="blog-post-meta"><strong>More:&nbsp</strong> <a href="{{ $news->link }}">{{ $news->title }}</a></p>
                <br>
            @endif
            <p class="blog-post-meta"><strong>Source:&nbsp</strong> <a href="{{ route('news.source', ['source' => $news->source]) }}">{{ $news->source->title }}</a></p>
        </article>
    </div>
    <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            @if($news->image)
            <img src="{{ str_contains($news->image, 'https') ? $news->image : Storage::url($news->image) }}" alt="{{ $news->title }}" style="width: 100%;">
            @endif
        </div>
    </div>
    <a class="link-secondary" href="{{ url()->previous() }}" style="width: fit-content; margin-top: 1rem;">Back</a>
</div>

@endsection

