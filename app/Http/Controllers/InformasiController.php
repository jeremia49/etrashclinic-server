<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class InformasiController extends Controller
{
    
    public function informasi(){
        $informasis = Informasi::all();

        return view('informasi.index', [
            "informasis"=>$informasis,
        ]);
    }
    
    public function addinformasi(){
        return view('informasi.add');
    }

    public function addinformasip(Request $request){
        
        $validator = Validator::make($request->all(), [
            'judul'=>'required',
            'konten'=>'required',
            'image'=>'required|file',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();

        $imgpath = $request->image->store('image', 'public');

        $informasi = new Informasi();
        $informasi->author = auth()->user()->id;
        $informasi->title = $validated['judul'];
        $informasi->content = $validated['konten'];
        $informasi->imgUrl = $imgpath;
        $informasi->save();
        
        
        return redirect()->route('informasi');
    }
    public function viewInformasi(int $id){
        $informasi = Informasi::findOrFail($id);
        return view('informasi.view',[
            'data' => $informasi
        ]);
    }

    public function editinformasi(int $id){
        return view('informasi.edit');
    }

    public function deleteinformasi(int $id){
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();
        return redirect()->back();
    }


}
