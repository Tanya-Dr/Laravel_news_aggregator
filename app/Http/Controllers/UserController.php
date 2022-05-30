<?php

namespace App\Http\Controllers;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function feedback(Request $request)
    {
        if($request->isMethod('post')) {
            $validated = $request->only(['user_name', 'text_review']);
            $reviews = Review::create($validated);

            if($reviews) {
                return redirect()->route('reviews')
                    ->with('success', 'Your review was added successfully');
            }
            return back()->with('error', 'Review add error');
        }
        return view('user.feedback');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function dataUpload(Request $request)
    {
        if($request->isMethod('post')) {
            $validated = $request->only(['user_name', 'phone', 'email', 'info']);
            $orders = Order::create($validated);

            if($orders) {
                return redirect()->route('user.dataUpload')
                    ->with('success', 'Your order was made successfully');
            }
            return back()->with('error', 'Order make error');
        }
        return view('user.dataUpload');
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
