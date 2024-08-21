<?php

namespace App\Http\Controllers;

use App\Models\SampahPengguna;
use App\Models\sampahpenggunaPengguna;
use App\Models\SampahUnitPrice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SampahPenggunaController extends Controller
{
    
    public function sampahpengguna(){
        // $sampahpenggunas = SampahPengguna::all();

        $sampahpenggunas = SampahPengguna::select("table_sampah.*", "table_unitprice.title", "table_unitprice.rupiah")
        ->where("table_sampah.isApproved","0")
        ->where("table_sampah.isDeclined","0")
        ->join("table_unitprice","table_unitprice.id", "=", "table_sampah.unitid")
        ->get();
        
        return view('sampahpengguna.index', [
            "sampahpenggunas"=>$sampahpenggunas,
        ]);
    }

    public function editsampahpengguna(int $id){
        return view('sampahpengguna.edit');
    }


    public function deletesampahpengguna(int $id){
        $sampahpengguna = SampahPengguna::findOrFail($id);
        $sampahpengguna->delete();
        return redirect()->back();
    }

    public function approvesampahpengguna(int $id){
        $sampahpengguna = SampahPengguna::findOrFail($id);
        $sampahpengguna->isApproved=true;

        $unitprice = SampahUnitPrice::findOrFail($sampahpengguna->unitid);

        // Update Sampah pengguna
        $sampahpengguna->price = $unitprice->rupiah;
        $sampahpengguna->satuan = $unitprice->satuan;
        $sampahpengguna->save();

        $totalprice = $sampahpengguna->total * $unitprice->rupiah;
        $addCoin = $totalprice / 1000;
        $addSaldo = $totalprice / 10;

        $user = User::findOrFail($sampahpengguna->author);
        $user->coinBalance += $addCoin;
        $user->saldoBalance += $addSaldo;
        $user->save();

        return redirect()->back();
    }
    
    public function declinesampahpengguna(int $id){
        $sampahpengguna = SampahPengguna::findOrFail($id);
        $sampahpengguna->isDeclined=true;
        $sampahpengguna->save();

        return redirect()->back();
    }
    
    public function addSampahPengguna(Request $request){ //api
          
        $validator = Validator::make($request->all(), [
            '*.id'=>'required',
            '*.berat'=>'required',
            '*.image'=>'required',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();

        foreach ($validated as $item) {
            // Step 4: Insert each record into the database
            SampahPengguna::create([
                'author'=> auth()->user()->id,
                'unitid' => $item['id'],
                'total' => $item['berat'],
                'imgUrl' => $item['image'],
            ]);
        }

        return response()->json([
            'status' => 'ok',
            'message'=> "Sukses",
            'reason' => null,
        ]);


    }

    public function historySampah(Request $request){
            $user = $request->user();

            $sampahpengguna = SampahPengguna::select('table_sampah.*', 'table_unitprice.title', 'table_unitprice.rupiah AS origprice', 'table_unitprice.satuan AS origstatus')
                ->where('table_sampah.author', $user->id)
                ->join("table_unitprice","table_unitprice.id", "=", "table_sampah.unitid")
                ->orderBy('table_sampah.created_at', 'desc')->get();

            return response()->json([
                'status' => 'ok',
                'message' => 'Sukses',
                "reason"=>null,
                "data"=>$sampahpengguna,
            ]);
    }
}
