<?php

namespace Units\Home\Http\Controllers\Frontend;

class HomeController
{
    public function index(): \Illuminate\View\View
    {
        return view('frontend.home');
    }
}
