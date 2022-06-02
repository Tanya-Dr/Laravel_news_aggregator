@extends('layouts.main')
@section('title') - Reviews @parent @stop

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <h1 class="pb-4 mb-4 fst-italic border-bottom">
                    Reviews
                </h1>
                @include('inc.messages')
                @forelse($reviews as $review)
                    <article class="blog-post">
                        <h2 class="blog-post-title">{{ $review->user_name }}</h2>
                        <p class="blog-post-meta">@if($review->created_at) {{ $review->created_at->format('d-m-Y H:i') }} @endif</p>
                        <p>{{ $review->text_review }}</p>
                    </article>
                    <hr>
                @empty
                <h2>There's no reviews</h2>
                @endforelse
            </div>
        </div>
        {{ $reviews->links() }}
    </main>
@endsection

