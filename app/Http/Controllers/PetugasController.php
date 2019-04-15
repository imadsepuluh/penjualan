<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
     public function all(){
        $data['petugas'] = \App\Petugas::all();

        return view('admin.include.petugas.all')->with($data);
    }
    
    public function add(){
        return view('petugas.add');
    }

    public function save(Request $r){
       
        $petugas = new petugas;
        $petugas->idpetugas = $r->input('id_petugas');
        $petugas->namapetugas = $r->input('nama_petugas');
        $petugas->alamat = $r->input('alamat');
        $petugas->email = $r->input('email');
        $petugas->telpon = $r->input('telpon');

        $petugas->save();

        return redirect('/petugas/all');
    }

    
    public function update(Request $r ,$id){
        $petugas = petugas::find($id);;
        $petugas->idpetugas = $r->idpetugas;
        $petugas->namapetugas = $r->namapetugas;
        $petugas->alamat = $r->alamat;
        $petugas->email = $r->email;
        $petugas->telpon = $r->telpon;


        $petugas->save();

        return redirect('/petugas/all');
    }
    

    public function delete($id){
        $petugas = petugas::find($id);
        $petugas->delete();
        return redirect('/petugas/all');
    }
}
