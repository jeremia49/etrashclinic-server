<?php

namespace App\Http\Controllers;

use App\Models\ProdukHasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukHasilController extends Controller
{
    
    public function produkhasil(){
        $produkhasils = ProdukHasil::all();

        return view('produkhasil.index', [
            "produkhasils"=>$produkhasils,
        ]);
    }
    
    public function addprodukhasil(){
        return view('produkhasil.add');
    }

    public function addprodukhasilp(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'price'=>'required',
            'image'=>'required|file',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();

        $imgpath = $request->image->store('image', 'public');
        
        $produkhasil = new ProdukHasil();
        $produkhasil->author = auth()->user()->id;
        $produkhasil->title = $validated['title'];
        $produkhasil->price = $validated['price'];

        $produkhasil->imgUrl = $imgpath;

        $produkhasil->save();
        return redirect()->route('produkhasil');
    }
    
    public function viewprodukhasil(int $id){
        $produkhasil = ProdukHasil::findOrFail($id);
        return view('produkhasil.view',[
            'data' => $produkhasil
        ]);
    }

    public function editprodukhasil(int $id){
        return view('produkhasil.edit');
    }

    public function deleteprodukhasil(int $id){
        $produkhasil = ProdukHasil::findOrFail($id);
        $produkhasil->delete();
        return redirect()->back();
    }

}
