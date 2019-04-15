<?php

namespace App\Http\Controllers;

use App\DetailBarangMasuk;
use Illuminate\Http\Request;

class DetailBarangMasukController extends Controller
{
   public function all(){
        $data['detailbarangmasuk'] = \App\DetailBarangMasuk::all();

        return view('admin.include.Detail Barang Masuk.all')->with($data);
    }
    
    public function add(){
        return view('detailbarangmasuk.add');
    }

    public function save(Request $r){
        $detailbarangmasuk = new detailbarangmasuk;
        $detailbarangmasuk->nonota = $r->input('no_nota');
        $detailbarangmasuk->kodebarang = $r->input('kode_barang');
        $detailbarangmasuk->jumlah = $r->input('jumlah');
        $detailbarangmasuk->subtotal = $r->input('sub_total');

        $detailbarangmasuk->save();

        return redirect('/detailbarangmasuk/all');
    }

    public function update(Request $r ,$id){
        $detailbarangmasuk = detailbarangmasuk::find($id);
        $detailbarangmasuk->nonota = $r->nonota;
        $detailbarangmasuk->kodebarang = $r->kodebarang;
        $detailbarangmasuk->jumlah = $r->jumlah;
        $detailbarangmasuk->subtotal = $r->subtotal;

        $detailbarangmasuk->save();

        return redirect('/detailbarangmasuk/all');
    }
    

    public function delete($id){
        $detailbarangmasuk = detailbarangmasuk::find($id);
        $detailbarangmasuk->delete();
        return redirect('/detailbarangmasuk/all');
    }
}
