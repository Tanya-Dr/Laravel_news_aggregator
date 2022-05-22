<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function feedback(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'name' => ['required', 'string'],
                'review' => ['required', 'string']
            ]);
            $toPut = $request->input('name') . ": " . $request->input('review');
            Storage::append('feedback.txt', $toPut);
            return redirect()->route('news');
        }
        return view('user.feedback');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dataUpload(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string'],
                'info' => ['required', 'string'],
                'phone' => ['required']
            ]);
            $toPut = $request->input('name') . ", " . $request->input('phone') . ", " . $request->input('email') . ", " . $request->input('info');
            Storage::append('dataUpload.txt', $toPut);
//            return redirect()->route('news');
            return "Order is processed";
        }
        return view('user.dataUpload');
    }
}
