<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFeedBackRequest;
use App\Mail\User\FeedBackMail;
use App\Models\FeedBack;
use App\Models\User;
use App\Services\FeedBackService;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;


class FeedBackFormController extends Controller
{

    /** @var FeedBackService */
    private $feedBackService;

    public function __construct(FeedBackService $feedBackService)
    {
        $this->feedBackService = $feedBackService;
    }


    public function create(): View
    {

        $user = Auth::user();

        return view('feedbackform', compact('user'));
    }

    public function store(CreateFeedBackRequest $request): RedirectResponse
    {
        $feedback = FeedBack::where('user_id', '=', Auth::user()->id)
            ->select('created_at')->latest()->first();

        $dataCreatedAddDay = Carbon::parse($feedback->created_at)->addDay();

        $today = Carbon::now();


        if($today > $dataCreatedAddDay) {
            $mailManager = User::where('id', '=', '1')->select('email')->first();

            $feedBack = $this
                ->feedBackService
                ->create($request->validated());
            if($feedBack) {
                Mail::to($mailManager->email)->send(new FeedBackMail($feedBack));
                return redirect()->route('main.feedbackform.create')
                    ->with('success', 'Ваша  форма успішно відправлена в обробку.');
            } else {
                return back()->withErrors(['msd' => 'Помилка збереження.'])
                    ->withInput();
            }
        } else {
            return redirect()->route('main.feedbackform.create')
                ->with('success', ' !! Помилка !!   Подача форми дозволена лише 1 раз в 24 год.');
        }

    }
}
