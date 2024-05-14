<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class WarehouseManagerController extends Controller
{

    public function dashboard(): View
    {
        $user = Auth::user();
        return view('warehouse_manager.warehouse-manager-dashboard');
    }

    public function generateQR(): View
    {
        return view('warehouse_manager.generate-qr');
    }
    public function qrScan(): View
    {
        return view('warehouse_manager.qrScan');
    }

}
