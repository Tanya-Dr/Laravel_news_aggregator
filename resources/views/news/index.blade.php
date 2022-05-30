@extends('layouts.main')
@section('title') List @if(request()->routeIs('news.category')) - {{ $category->title }} @elseif(request()->routeIs('news.source')) - {{ $source->title }} @endif @parent @stop

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as $news)
        <div class="col">
            <div class="card shadow-sm">
                <a href = "{{ route('news.show',['news' => $news]) }}">
                        <img src="{{ $news->image }}" width="100%" height="225" alt="{{ $news->title }}">
                </a>
                <div class="card-body">
                    <strong>
                        <a href="{{ route('news.show',['news' => $news]) }}">{{ $news->title }}</a>
                    </strong>
                        <p class="card-text">{{ $news->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('news.show',['news' => $news]) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        </div>
                        <small class="text-muted"><strong>Author: </strong>{{ $news->author }}</small>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h2>There's no news</h2>
        @endforelse
    </div>
    <div style="margin-top: 20px;">
        {{ $newsList->links() }}
    </div>
@endsection

