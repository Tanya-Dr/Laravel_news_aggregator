<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function makeOrder()
    {
        return view('order.create');
    }

    /**
     * @param  OrderCreateRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function storeOrder(OrderCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $orders = Order::create($validated);

        if($orders) {
            return redirect()->route('order.make')
                ->with('success', __('message.orders.create.success'));
        }
        return back()->with('error', __('message.orders.create.fail'));
    }

}
