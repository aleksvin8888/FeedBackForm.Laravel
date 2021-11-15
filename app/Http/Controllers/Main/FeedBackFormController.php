<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFeedBackRequest;
use App\Services\FeedBackService;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class FeedBackFormController extends Controller
{

    /** @var FeedBackService */
    private $feedBackService;

    public function  __construct(FeedBackService $feedBackService){
        $this->feedBackService = $feedBackService;
    }


    public function create() :View
    {

        $user = Auth::user();

        return view('feedbackform', compact('user'));
    }

    public function store(CreateFeedBackRequest $request): RedirectResponse
    {

        $feedBack = $this
            ->feedBackService
            ->create($request->validated());
        if($feedBack) {
            return redirect()->route('main.feedbackform.create')
                ->with('success', 'Ваша  форма успішно відправлена в обробку.');
        } else {
            return back()->withErrors(['msd' => 'Помилка збереження.'])
                ->withInput();
        }
    }
}
