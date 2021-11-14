<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class FeedBackFormController extends Controller
{
    public function create() :View
    {

        $user = Auth::user();

        return view('feedbackform', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        dd($request);
    }
}
