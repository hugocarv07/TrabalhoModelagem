<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function howItWorks()
    {
        return view('pages.how-it-works');
    }
}