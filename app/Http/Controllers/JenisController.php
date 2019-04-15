<?php

namespace App\Http\Controllers;

use App\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function all(){
        $data['jenis'] = \App\Jenis::all();

        return view('admin.include.Jenis.all')->with($data);
    }
    
    public function add(){
        return view('jenis.add');
    }

    public function save(Request $r){
        $jenis = new jenis;
        $jenis->kodejenis = $r->input('kodejenis');
        $jenis->jenis = $r->input('jenis');

        $jenis->save();

        return redirect('/jenis/all');
    }

    public function update(Request $r ,$id){
        $jenis = jenis::find($id);
        $jenis->kodejenis = $r->kodejenis;
        $jenis->jenis = $r->jenis;

        $jenis->save();

        return redirect('/jenis/all');
    }   

    public function delete($id){
        $jenis = jenis::find($id);
        $jenis->delete();
        return redirect('/jenis/all');
    }
}
