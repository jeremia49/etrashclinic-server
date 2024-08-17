<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\SampahUnitPrice;
use Exception;
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


    
    public function storeImage(Request $request){
        if ($request->hasFile('photo')) {
            try{
                
                $imgpath = $request->photo->store('image', 'public');
                if(!$imgpath){
                    return response()->json([
                        'status' => 'error',
                        'message'=> "Error uploading file",
                        'reason' => null,
                    ],500);
                }
                
                return response()->json([
                    'status' => 'ok',
                    'message'=> "Sukses",
                    'reason' => null,
                    'data'=>url("/storage/".$imgpath)
                ]);

            }catch(Exception $e){
                return response()->json([
                    'status' => 'error',
                    'message'=> "Error uploading file",
                    'reason' => $e->getMessage(),
                ],500);
            }

        }else{
            return response()->json([
                'status' => 'error',
                'message'=> "photo not exist",
                'reason' => null,
            ],400);
        }

    }

    public function addSampahPengguna(Request $request){
          
        $validator = Validator::make($request->all(), [
            '*.id'=>'required',
            '*.berat'=>'required',
            '*.image'=>'required',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();
        

    }


}
