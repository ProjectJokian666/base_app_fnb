<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Satuan;

use Illuminate\Support\Facades\Auth;

class SatuanController extends Controller
{
    public function akses()
    {
        if (Auth()->user()->role=="Kasir") {
            return redirect('/');
        }
    }

    public function index()
    {   
        $this->akses();
        $data = [
            'satuan' => Satuan::all(),
        ];
        return view('master.satuan.index',compact('data'));
    }

    public function add()
    {
        $this->akses();
        return view('master.satuan.add');
    }

    public function create(Request $request)
    {
        $this->akses();
        // dd($request);
        $request->validate([
            'satuan'=>'required|unique:satuans',
        ]);
        $data = Satuan::create([
            'satuan'=>strtoupper($request->satuan),
        ]);
        if ($data) {
            return redirect('master/satuan')->with('sukses','Data berhasil ditambahkan');
        }
        else{
            return redirect('master/satuan')->with('gagal','Data gagal ditambahkan');
        }
    }

    public function update($id)
    {
        $this->akses();
        $data = Satuan::find($id);
        return view('master.satuan.update',compact('data'));
    }

    public function patch(Request $request,$id)
    {
        // dd($request,$id);
        $this->akses();
        $data = Satuan::where('id',$id)->update([
            'satuan'=>strtoupper($request->satuan),
        ]);
        if ($data) {
            return redirect('master/satuan/update/'.$id)->with('sukses','Data berhasil diubah');
        }
        else{
            return redirect('master/satuan/update/'.$id)->with('gagal','Data gagal diubah');
        }
    }

    public function delete($id)
    {
        $this->akses();
        $data = Satuan::where('id',$id)->delete();
        if ($data) {
            return redirect('master/satuan')->with('sukses','Data berhasil dihapus');
        }
        else{
            return redirect('master/satuan')->with('gagal','Data gagal dihapus');
        }
    }
}
