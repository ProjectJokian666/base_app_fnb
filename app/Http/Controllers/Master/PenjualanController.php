<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Penjualan;
use App\Models\Bahan;
use App\Models\Gudang;

class PenjualanController extends Controller
{   
    public function index()
    {
        $data = [
            'penjualan' => Penjualan::all(),
        ];
        return view('master.penjualan.index',compact('data'));
    }

    public function add()
    {
        return view('master.penjualan.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama'=>'required|unique:penjualans',
            'hpp'=>'required',
        ]);
        $data = Penjualan::create([
            'nama'=>strtoupper($request->nama),
            'hrg_jual'=>$request->hpp,
        ]);
        if ($data) {
            return redirect('master/penjualan')->with('sukses','Data berhasil ditambahkan');
        }
        else{
            return redirect('master/penjualan')->with('gagal','Data gagal ditambahkan');
        }
    }

    public function update($id)
    {
        $data = [
            'penjualan'=>Penjualan::find($id),
        ];
        // dd($data);
        return view('master.penjualan.update',compact('data'));
    }

    public function patch(Request $request,$id)
    {
        // dd($request,$id);
        $data = Penjualan::where('id',$id)->update([
            'nama'=>strtoupper($request->nama),
            'hrg_jual'=>$request->hpp,
        ]);
        if ($data) {
            return redirect('master/penjualan/update/'.$id)->with('sukses','Data berhasil diubah');
        }
        else{
            return redirect('master/penjualan/update/'.$id)->with('gagal','Data gagal diubah');
        }
    }

    public function delete($id)
    {
        $data = Penjualan::where('id',$id)->delete();
        if ($data) {
            return redirect('master/penjualan')->with('sukses','Data berhasil dihapus');
        }
        else{
            return redirect('master/penjualan')->with('gagal','Data gagal dihapus');
        }
    }

    public function bahan($id)
    {   
        $data = [
            'penjualan' => Penjualan::find($id),
            'bahan' => Bahan::where('id_penjualan','=',$id)->get(),
        ];
        return view('master.penjualan.bahan',compact('data'));
    }

    public function bahan_add($id)
    {
        // dd($id);
        $arr1=array();
        $arr2=array();
        $arr3=array();
        //get data bahan
        $data_bahan = Bahan::where('id_penjualan','=',$id)->get();
        foreach($data_bahan as $db){
            array_push($arr1,$db->id_gudang);
        }
        //get data gudang
        $data_gudang = Gudang::all();
        foreach($data_gudang as $dg){
            array_push($arr2,$dg->id);
        }
        //get data gudang ex bahan
        foreach (array_diff($arr2,$arr1) as $ad) {
            $a = Gudang::find($ad);
            array_push($arr3,[
                'id' => $a->id,
                'nama' => $a->nama,
            ]);
        }
        if (count($arr3)<=0) {
            return redirect('master/penjualan/bahan',$id);
        }

        $data=[
            'penjualan' => Penjualan::find($id),
            'gudang' => $arr3,
        ];
        // dd($data['gudang']);
        return view('master.penjualan.bahan_add',compact('data'));
    }

    public function bahan_post(Request $request,$id)
    {   
        // dd(gettype(intval($request->jumlah)),intval($request->jumlah)<=0);
        $request->jumlah = intval($request->jumlah);
        if (intval($request->jumlah)<0||intval($request->jumlah)=='0') {
            return redirect('master/penjualan/bahan/'.$id.'/add')->with('gagal','jumlah harus lebih dari 0');
        }
        // dd($request);
        $data = Bahan::create([
            'id_gudang' => $request->bahan,
            'id_penjualan' => $id,
            'jumlah' => $request->jumlah,
        ]);

        if ($data) {
            return redirect('master/penjualan/bahan/'.$id)->with('sukses','Data berhasil ditambahkan');
        }
        else{
            return redirect('master/penjualan/bahan/'.$id)->with('gagal','Data gagal ditambahkan');
        }
    }


}
