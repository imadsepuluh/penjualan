<?php

namespace App\Http\Controllers;

use App\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
   public function all(){
        $data['distributor'] = \App\Distributor::all();

        return view('admin.include.distributor.all')->with($data);
    }
    
    public function add(){
        return view('distributor.add');
    }

    public function save(Request $r){
        $distributor = new distributor;
        $distributor->iddistributor = $r->input('id_distributor');
        $distributor->namadistributor = $r->input('nama_distributor');
        $distributor->alamat = $r->input('alamat');
        $distributor->kotaasal = $r->input('kota_asal');
        $distributor->email = $r->input('email');
        $distributor->telpon = $r->input('telpon');

        $distributor->save();

        return redirect('/distributor/all');
    }

   public function update(Request $r ,$id){
        $distributor = distributor::find($id);;
        $distributor->iddistributor = $r->iddistributor;
        $distributor->namadistributor = $r->namadistributor;
        $distributor->alamat = $r->alamat;
        $distributor->kotaasal = $r->kotaasal;
        $distributor->email = $r->email;
        $distributor->telpon = $r->telpon;


        $distributor->save();

        return redirect('/distributor/all');
    }
    

    public function delete($id){
        $distributor = distributor::find($id);
        $distributor->delete();
        return redirect('/distributor/all');
    }
}
