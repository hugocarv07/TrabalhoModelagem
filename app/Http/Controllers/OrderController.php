<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function index()
    {
        return view('pages.orders');
    }
}