<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Informasi;
use App\Models\Leaderboard;
use App\Models\ProdukHasil;
use App\Models\SampahUnitPrice;
use App\Models\User;
use Illuminate\Http\Request;

class APIGeneralController extends Controller
{
    public function informasi(){
        $informasis = Informasi::orderBy('created_at', 'desc')->get();
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$informasis,
        ]);
    }

    public function artikel(){
        $artikels = Artikel::orderBy('created_at', 'desc')->get();
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

    public function leaderboard(Request $request)
    {
        $user = $request->user();
        $league = "silver";
        if($user->leagueBulanIni != ""){
            $league = $user->leagueBulanIni;
        }
        $leaderboard = Leaderboard::select("table_leaderboards.*","users.name", "users.photoUrl")
            ->join('users', 'users.id', '=', 'table_leaderboards.authorID' )
            ->where('table_leaderboards.league', $league)
            ->get();
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$leaderboard,
        ]);
    }

    public function currentLeaderboard(Request $request)
    {
        $user = $request->user();
        $league = "silver";
        if($user->leagueBulanIni != ""){
            $league = $user->leagueBulanIni;
        }
        $ranknumber = 1;
        $users = User::where('leagueBulanIni', $league)->orderBy('totalSampahBulanIni','desc')->get();
        $data = [];
        foreach ($users as $user) {
           $user->rank = $ranknumber;
           $data[] = $user;
           $ranknumber++;
        }
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$data,
        ]);
    }

}
