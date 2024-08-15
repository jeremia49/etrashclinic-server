<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Informasi;
use App\Models\ProdukHasil;
use App\Models\SampahUnitPrice;
use Illuminate\Http\Request;

class APIGeneralController extends Controller
{
    public function informasi(){
        $informasis = Informasi::all();
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$informasis,
        ]);
    }

    public function artikel(){
        $artikels = Artikel::all();
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$artikels,
        ]);
    }

    public function sampahunitprice(){
        $data = SampahUnitPrice::all();
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$data,
        ]);
    }

    public function produkhasil(){
        $data = ProdukHasil::all();
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$data,
        ]);
    }

    public function me(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$user,
        ]);
    }

}
