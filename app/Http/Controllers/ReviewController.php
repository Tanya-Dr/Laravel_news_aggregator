<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsCreateRequest;
use App\Models\Review;
use App\Queries\QueryBuilderReviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function makeReview(Request $request)
    {
        return view('review.create');
    }

    /**
     * @param  ReviewsCreateRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function storeReview(ReviewsCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $reviews = Review::create($validated);

        if($reviews) {
            return redirect()->route('reviews.index')
                ->with('success', __('message.reviews.create.success'));
        }
        return back()->with('error', __('message.reviews.create.fail'));
    }

    /**
     * @param QueryBuilderReviews $reviews
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showReviews(QueryBuilderReviews $reviews)
    {
        return view('review.index', ['reviews' => $reviews->getReviews()]);
    }
}
