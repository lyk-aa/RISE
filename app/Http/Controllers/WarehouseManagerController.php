<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        $products = DB::table('products')->get();

        return view('warehouse_manager.generate-qr', ['products' => $products]);
    }

    public function qrScan(): View
    {
        return view('warehouse_manager.qrScan');
    }

    public function foroutbound(): View
    {
        return view('warehouse_manager.foroutbouond');
    }

    public function outbound_stocks(): View
    {
        $warehouse_stocks = DB::table('warehouse_stocks')->get();
        $products = DB::table('products')->get();
        $warehouse_data = [
            'warehouse_stocks' => $warehouse_stocks,
            'products' => $products,
        ];

        return view('warehouse_manager.outbound_stocks', ['warehouse_data' => $warehouse_data]);
    }

    public function create(): View
    {
        return view('warehouse_manager.create');
    }

    public function warehouse(Request $request)
    {
        $warehouse_stocks = DB::table('warehouse_stocks')->get();
        $products = DB::table('products')->get();
        $warehouse_data = [
            'warehouse_stocks' => $warehouse_stocks,
            'products' => $products,
        ];

        return view('warehouse_manager.warehouse', ['warehouse_data' => $warehouse_data]);
    }

    public function add_stocks(Request $request)
    {
        $batch_code = Str::random(10);
        $product_code = Str::upper(Str::random(8));
        $qr_code = Str::upper(Str::random(16));
        $data = new Warehouse;
        $data->product_id = $request->rice_type;
        $data->unit = $request->unit;
        $data->quantity = $request->quantity;
        $data->arrival_date = $request->arrival_date;
        $data->batch_code = $batch_code;
        $data->product_code = $product_code;
        $data->qr_code = $qr_code;
        $data->invtype_id = '1';
        $data->warehouse_id = '1';

        $data->save();

        return redirect()->back();
    }
}
