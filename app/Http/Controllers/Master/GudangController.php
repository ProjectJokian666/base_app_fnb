<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gudang;
use App\Models\Satuan;

class GudangController extends Controller
{
    public function index()
    {
        $data = [
            'gudang' => Gudang::all(),
        ];
        // dd($data);
        return view('master.gudang.index',compact('data'));
    }

    public function add()
    {   
        if (Satuan::all()->count()<=0) {
            return redirect('master/satuan');
        }
        $data = [
            'satuan' => Satuan::all(),
        ];
        // dd($data);
        return view('master.gudang.add',compact('data'));
    }

    public function create(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama'=>'required|unique:gudangs',
            'satuan'=>'required',
            'stok'=>'required',
            'hpp'=>'required',
        ]);
        $data = Gudang::create([
            'nama'=>strtoupper($request->nama),
            'id_satuan'=>$request->satuan,
            'stok'=>$request->stok,
            'hpp'=>$request->hpp,
        ]);
        if ($data) {
            return redirect('master/gudang')->with('sukses','Data berhasil ditambahkan');
        }
        else{
            return redirect('master/gudang')->with('gagal','Data gagal ditambahkan');
        }
    }

    public function update($id)
    {
        $data = [
            'gudang'=>Gudang::find($id),
            'satuan'=>Satuan::all(),
        ];
        // dd($data);
        return view('master.gudang.update',compact('data'));
    }

    public function patch(Request $request,$id)
    {
        // dd($request,$id);
        $data = Gudang::where('id',$id)->update([
            'nama'=>strtoupper($request->nama),
            'id_satuan'=>$request->satuan,
            'stok'=>$request->stok,
            'hpp'=>$request->hpp,
        ]);
        if ($data) {
            return redirect('master/gudang/update/'.$id)->with('sukses','Data berhasil diubah');
        }
        else{
            return redirect('master/gudang/update/'.$id)->with('gagal','Data gagal diubah');
        }
    }

    public function delete($id)
    {
        $data = Gudang::where('id',$id)->delete();
        if ($data) {
            return redirect('master/gudang')->with('sukses','Data berhasil dihapus');
        }
        else{
            return redirect('master/gudang')->with('gagal','Data gagal dihapus');
        }
    }
}
