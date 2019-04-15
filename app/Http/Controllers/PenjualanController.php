<?php

namespace App\Http\Controllers;

use App\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function all(){
        $data['penjualan'] = \App\Penjualan::all();

        return view('admin.include.penjualan.all')->with($data);
    }
    
    public function add(){
        return view('penjualan.add');
    }

    public function save(Request $r){
        $penjualan = new penjualan;
        $penjualan->nofaktur = $r->input('no_faktur');
        $penjualan->tanggalpenjualan = $r->input('tanggal_masuk');
        $penjualan->idpetugas = $r->input('petugas');
        $penjualan->bayar = $r->input('bayar');
        $penjualan->sisa = $r->input('sisa');
        $penjualan->total = $r->input('total');

        $penjualan->save();

        return redirect('/penjualan/all');
    }

    public function update(Request $r ,$id){
        $penjualan = penjualan::find($id);
        $penjualan->nofaktur = $r->no_faktur;
        $penjualan->tanggalpenjualan = $r->tgl_penjualan;
        $penjualan->idpetugas = $r->idpetugas;
        $penjualan->bayar = $r->bayar;
        $penjualan->sisa = $r->sisa;
        $penjualan->total = $r->total;

        $penjualan->save();

        return redirect('/penjualan/all');
    }
    

    public function delete($id){
        $penjualan = penjualan::find($id);
        $penjualan->delete();
        return redirect('/penjualan/all');
    }
}
