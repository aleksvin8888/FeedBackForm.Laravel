<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFeedBackRequest;
use App\Models\FeedBack;
use App\Models\Status;
use App\Services\FeedBackService;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class FeedBackController extends Controller
{
    /** @var FeedBackService */
    private $feedBackService;

    public function  __construct(FeedBackService $feedBackService){
        $this->feedBackService = $feedBackService;
    }

    public function index(): View
    {
        $feedbacks = FeedBack::all();
        $statuses = Status::all();
        return view('admin.feedback.index', compact('feedbacks', 'statuses'));

    }


    public function update(UpdateFeedBackRequest $request, FeedBack $feedback)
    {
        $feedback = $this
            ->feedBackService
            ->update($feedback, $request->validated());

        if($feedback) {
            return redirect()->route('admin.feedBack.index')
                ->with('success', 'відредаговано успішно.');
        } else {
            return back()->withErrors(['msd' => 'Помилка збереження.'])
                ->withInput();
        }
    }
}
