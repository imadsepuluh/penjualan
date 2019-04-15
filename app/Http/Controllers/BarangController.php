<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function all(){
        $data['barang'] = \App\Barang::all();

        return view('admin.include.barang.all')->with($data);
    }
    
    public function add(){
        return view('barang.add');
    }

    public function save(Request $r){
        $barang = new barang;
        $barang->kodebarang = $r->input('kode_barang');
        $barang->namabarang = $r->input('nama_barang');
        $barang->kodejenis = $r->input('kode_jenis');
        $barang->harganet = $r->input('harga_netral');
        $barang->stok = $r->input('stok');
        $barang->hargajual = $r->input('harga_jual');

        $barang->save();

        return redirect('/barang/all');
    }

    public function update(Request $r ,$id){
        $barang = barang::find($id);;
        $barang->kodebarang = $r->kode_barang;
        $barang->namabarang = $r->nama_barang;
        $barang->kodejenis = $r->kode_jenis;
        $barang->harganet = $r->harga_netral;
        $barang->stok = $r->stok;
        $barang->hargajual = $r->harga_jual;


        $barang->save();

        return redirect('/barang/all');
    }
    

    public function delete($id){
        $barang = barang::find($id);
        $barang->delete();
        return redirect('/barang/all');
    }
}
