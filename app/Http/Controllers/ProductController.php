<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{

    public function dashboard(): View
    {
        return view('owner.owner-dashboard');
    }

    public function products(): View
    {
        return view('owner.products');
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
