<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\ReviewsCreateRequest;
use App\Models\Order;
use App\Models\Review;
use App\Queries\QueryBuilderReviews;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'email' => ['required', 'string'],
                'password' => ['required']
            ]);
            return redirect()->route('news');
        }
        return view('user.auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function makeReview(Request $request)
    {
        return view('user.makeReview');
    }

    /**
     * @param  ReviewsCreateRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function storeReview(ReviewsCreateRequest $request)
    {
        $validated = $request->validated();
        $reviews = Review::create($validated);

        if($reviews) {
            return redirect()->route('reviews')
                ->with('success', __('message.user.reviews.create.success'));
        }
        return back()->with('error', __('message.user.reviews.create.fail'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function makeOrder()
    {
        return view('user.makeOrder');
    }

    /**
     * @param  OrderCreateRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function storeOrder(OrderCreateRequest $request)
    {
        $validated = $request->validated();
        $orders = Order::create($validated);

        if($orders) {
            return redirect()->route('user.makeOrder')
                ->with('success', __('message.user.orders.create.success'));
        }
        return back()->with('error', __('message.user.orders.create.fail'));
    }

    /**
     * @param QueryBuilderReviews $reviews
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showReviews(QueryBuilderReviews $reviews)
    {
        return view('reviews', ['reviews' => $reviews->getReviews()]);
    }
}
