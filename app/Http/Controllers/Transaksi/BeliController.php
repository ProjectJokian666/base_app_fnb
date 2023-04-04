<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Trx_Beli;
use App\Models\Gudang;

class BeliController extends Controller
{
    public function index()
    {
        $data = [
            'trx_beli' => Trx_Beli::all(),
        ];
        return view('transaksi.beli.index',compact('data'));
    }
    public function add()
    {
        $data = [
            'gudang' => Gudang::all(),
        ];
        return view('transaksi.beli.add',compact('data'));
    }
    public function create(Request $request)
    {
        // dd($request);
        $request->validate([
            'stok'=> 'required',
        ]);
        $a = Gudang::find($request->barang);
        $data = Trx_Beli::create([
            'id_gudang' => $a->id,
            'jumlah' => $request->stok,
            'harga' => $a->hrg_beli,
        ]);
        Gudang::where('id',$a->id)->update([
            'stok' => $a->stok+$request->stok,
        ]);
        if ($data) {
            return redirect('transaksi/beli')->with('sukses','Data berhasil ditambahkan');
        }
        else{
            return redirect('transaksi/beli')->with('gagal','Data gagal ditambahkan');
        }
    }
}
