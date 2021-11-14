<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;


class FeedBackFormController extends Controller
{
    public function create(){

        $user = Auth::user();

        return view('feedbackform', compact('user'));
    }

    public function store(Request $request){
        dd($request);
    }
}
