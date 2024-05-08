<?php

namespace App\Http\Controllers;

use Iluminate\View\View;

class ProductController extends Controller
{
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
}
