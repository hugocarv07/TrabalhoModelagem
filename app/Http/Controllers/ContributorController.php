<?php

namespace App\Http\Controllers;

class ContributorController extends Controller
{
    public function dashboard()
    {
        return view('pages.contributor.dashboard');
    }
}