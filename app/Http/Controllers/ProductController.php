<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{

    public function dashboard(): View
    {
        return view('owner.dashboard');
    }

    public function product(): View
    {
        return view('owner.product');
    }

    public function customer_order(): View
    {
        return view('owner.customer_order');
    }

    public function purchase_order(): View
    {
        return view('owner.purchase_order');
    }

    public function create(): View
    {
        return view('owner.create');
    }
}
