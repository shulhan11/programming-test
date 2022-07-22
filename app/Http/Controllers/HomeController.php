<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Sales_Det;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sales = Sales::latest();
        if (request('search')) {
            $sales->where('kode', 'like', '%' . request('search') . '%');
        }

        return view('Home.index', [
            'title' => 'Departement Produksi',
            'sales' => $sales->get()
            // 'barang' => Sales_Det::where('sales_id', 2)->get()
        ]);
    }


    public function show(Request $request, Sales_Det $sales_Det)
    {
        $id = request('id');
        // return dd($sales_Det::where('sales_id', $request->id)->get());
        return view('Home.detail', [
            // 'salesdet' => $sales_Det::where('sales_id', $request->id)->get()
            'salesdet' => $sales_Det::where('sales_id', $id)->get()
        ]);
    }
}
