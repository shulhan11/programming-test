<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Sales;
use App\Models\Sales_Det;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Barang $barang, Customer $customer)
    {
        $query = DB::table('sales')->select(DB::raw('MAX(RIGHT(kode,4)) as kode'));
        $kode = "";
        if ($query->count() > 0) {
            foreach ($query->get() as $kd) {
                $tmp = ((int)$kd->kode) + 1;
                $kode = sprintf("%04s", $tmp);
            }
        } else {
            $kode = '0001';
        }

        // return $kode;
        return view('Transaksi_view.index', [
            'title' => 'Department Produksi',
            'kode' => $kode,
            'barang' => $barang::all(),
            'customer' => $customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sales $sales)
    {
        // dd($request->all());

        $data = $request->all();

        $transaksi = new Sales;
        // $transaksi->kode = $data['no_transaksi'];
        // $transaksi->tanggal = $data['tanggal'];
        // $transaksi->customer_id = $data['id_cs'];
        // $transaksi->subtotal = $data['sub_total'];
        // $transaksi->diskon = $data['diskon_total'];
        // $transaksi->ongkir = $data['ongkir'];
        // $transaksi->total_bayar = $data['total_bayar'];
        // $transaksi->save();

        $validation = $request->validate([
            'kode' => 'required',
            'tanggal' => 'required',
            'customer_id' => 'required',
            'subtotal' => 'required',
            'diskon' => 'required',
            'ongkir' => 'required',
            'total_bayar' => 'required',
        ]);

        $sl =   Sales::create($validation);


        if (is_countable($data['id_br']) && count($data['id_br']) > 0) {
            foreach ($data['id_br'] as $item => $value) {
                $data2 = array(
                    'sales_id' => $sl->id,
                    'barang_id' => $data['id_br'][$item],
                    'harga_bandrol' => $data['harga_bandrol'][$item],
                    'qty' => $data['qty'][$item],
                    'diskon_pct' => $data['persen'][$item],
                    'diskon_nilai' => $data['rupiah'][$item],
                    'harga_diskon' => $data['harga_diskon'][$item],
                    'total' => $data['total'][$item],

                );
                Sales_Det::create($data2);
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
