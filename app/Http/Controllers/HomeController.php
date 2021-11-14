<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        if (auth()->user()->isManager()){
            dd(auth()->user()->name, 'Страница менеджера');
        } elseif(auth()->user()->isUser()){
            return redirect()->route('main.feedbackform.create')
                ->with('success', 'Вітаємо в системі заповніть форму');
        }
    }
}
