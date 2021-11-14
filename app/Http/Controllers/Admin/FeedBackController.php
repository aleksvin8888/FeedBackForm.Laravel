<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;


class FeedBackController extends Controller
{
    public function create(){

        $user = Auth::user();

        return view('feedbackform', compact('user'));
    }

    public function store(Request $request){
        dd($request);
    }
}
