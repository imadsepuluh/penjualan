<?php

namespace App\Http\Controllers;

use App\DetailPenjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function all(){
        $data['detailpenjualan'] = \App\DetailPenjualan::all();

        return view('admin.include.Detail Penjualan.all')->with($data);
    }
    
    public function add(){
        return view('detailpenjualan.add');
    }

    public function save(Request $r){
        $detailpenjualan = new detailpenjualan;
        $detailpenjualan->nofaktur = $r->input('nofaktur');
        $detailpenjualan->kodebarang = $r->input('kodebarang');
        $detailpenjualan->jumlah = $r->input('jumlah');
        $detailpenjualan->subtotal = $r->input('subtotal');

        $detailpenjualan->save();

        return redirect('/detailpenjualan/all');
    }

    public function update(Request $r ,$id){
        $detailpenjualan = detailpenjualan::find($id);;
        $detailpenjualan->nofaktur = $r->nofaktur;
        $detailpenjualan->kodebarang = $r->kodebarang;
        $detailpenjualan->jumlah = $r->jumlah;
        $detailpenjualan->subtotal = $r->subtotal;
        $detailpenjualan->save();

        return redirect('/detailpenjualan/all');
    }
    

    public function delete($id){
        $detailpenjualan = detailpenjualan::find($id);
        $detailpenjualan->delete();
        return redirect('/detailpenjualan/all');
    }
}
