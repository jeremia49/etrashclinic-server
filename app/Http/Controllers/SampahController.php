<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\SampahUnitPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SampahController extends Controller
{
    
    public function sampah(){
        $sampahs = SampahUnitPrice::all();

        return view('sampah.index', [
            "sampahs"=>$sampahs,
        ]);
    }
    
    public function addsampah(){
        return view('sampah.add');
    }

    public function addsampahp(Request $request){
        
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'satuan'=>'required',
            'minprice'=>'required',
            'maxprice'=>'required',
            'image'=>'required|file',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();

        $imgpath = $request->image->store('image', 'public');
        
        $sampah = new SampahUnitPrice();
        $sampah->author = auth()->user()->id;
        $sampah->title = $validated['nama'];
        $sampah->satuan = $validated['satuan'];
        $sampah->minprice = $validated['minprice'];
        $sampah->maxprice = $validated['maxprice'];

        $sampah->imgUrl = $imgpath;

        $sampah->save();
        return redirect()->route('sampah');
    }
    
    public function viewsampah(int $id){
        $sampah = SampahUnitPrice::findOrFail($id);
        return view('sampah.view',[
            'data' => $sampah
        ]);
    }

    public function editsampah(int $id){
        return view('sampah.edit');
    }

    public function deletesampah(int $id){
        $sampah = SampahUnitPrice::findOrFail($id);
        $sampah->delete();
        return redirect()->back();
    }

}
