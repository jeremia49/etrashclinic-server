<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArtikelController extends Controller
{
    
    public function artikel(){
        $artikels = Artikel::all();

        return view('artikel.index', [
            "artikels"=>$artikels,
        ]);
    }
    
    public function addartikel(){
        return view('artikel.add');
    }

    public function addartikelp(Request $request){
        
        $validator = Validator::make($request->all(), [
            'judul'=>'required',
            'konten'=>'nullable',
            'image'=>'required|file',
            'video'=>'nullable|file',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();

        $imgpath = $request->image->store('image', 'public');
        
        $artikel = new Artikel();
        $artikel->author = auth()->user()->id;
        $artikel->title = $validated['judul'];
        $artikel->content = $validated['konten'];
        $artikel->imgUrl = $imgpath;

        $isVideo = false;
        if(array_key_exists("video", $validated)){
            $isVideo = true;
            $videopath = $request->video->store('video', 'public');
            $artikel->content = $videopath;
            $artikel->isVideo = $isVideo;
        }
        $artikel->isVideo = $isVideo;

        $artikel->save();
        
        
        return redirect()->route('artikel');
    }
    
    public function viewartikel(int $id){
        $artikel = artikel::findOrFail($id);
        return view('artikel.view',[
            'data' => $artikel
        ]);
    }

    public function editartikel(int $id){
        return view('artikel.edit');
    }

    public function deleteartikel(int $id){
        $artikel = artikel::findOrFail($id);
        $artikel->delete();
        return redirect()->back();
    }


}
