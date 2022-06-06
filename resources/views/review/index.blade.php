@extends('layouts.main')
@section('title') - Reviews @parent @stop

@section('content')
    <main class="container">
        <div class="row g-4">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 border-bottom">Reviews</h3>
                @include('inc.messages')
                @forelse($reviews as $review)
                    <article class="blog-post" style="margin-bottom: 10px;">
                        <strong class="d-inline-block mb-2 text-primary" style="font-size: 1rem;">{{ $review->user_name }}</strong>
                        <p>{{ $review->text_review }}</p>
                        <p class="blog-post-meta">@if($review->created_at) {{ $review->created_at->format('d-m-Y H:i') }} @endif</p>
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

