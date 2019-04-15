<?php

namespace App\Http\Controllers;

use App\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function all(){
        $data['barangmasuk'] = \App\BarangMasuk::all();

        return view('admin.include.BarangMasuk.all')->with($data);
    }
    
    public function add(){
        return view('barangmasuk.add');
    }

    public function save(Request $r){
        $barangmasuk = new barangmasuk;
        $barangmasuk->nonota = $r->input('no_nota');
        $barangmasuk->tanggalmasuk = $r->input('tanggal_masuk');
        $barangmasuk->iddistributor = $r->input('distributor');
        $barangmasuk->idpetugas = $r->input('petugas');
        $barangmasuk->total = $r->input('total');

        $barangmasuk->save();

        return redirect('/barangmasuk/all');
    }

    public function update(Request $r ,$id){
        $barangmasuk = barangmasuk::find($id);
        $barangmasuk->nonota = $r->no_nota;
        $barangmasuk->tanggalmasuk = $r->tanggal_masuk;
        $barangmasuk->iddistributor = $r->id_distributor;
        $barangmasuk->idpetugas = $r->id_petugas;
        $barangmasuk->total = $r->total;

        $barangmasuk->save();

        return redirect('/barangmasuk/all');
    }
    

    public function delete($id){
        $barangmasuk = barangmasuk::find($id);
        $barangmasuk->delete();
        return redirect('/barangmasuk/all');
    }
}
