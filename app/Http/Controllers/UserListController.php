<?php

namespace App\Http\Controllers;

use App\Events\RefundCoin;
use App\Events\RefundSaldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserListController extends Controller
{
    public function pengguna(){
        $users = User::all();

        return view('users.index', [
            "users"=>$users,
        ]);
    }

    public function refundCoin(int $id){
        $user = User::findOrFail($id);

        return view('users.refundcoin', [
            "user"=>$user,
        ]);
    }

    public function refundCoinp(int $id, Request $request){
        $validator = Validator::make($request->all(), [
            'change'=>'required',
            'reason'=>'required',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();
        
        $user = User::findOrFail($id);
        
        if($user->coinBalance < $validated['change']){
            return redirect()->back();
        }

        $user->coinBalance -= $validated['change'];
        $user->save();
        
        RefundCoin::dispatch($user->id, $validated['reason']);
        
        return redirect()->route('pengguna');
    }

    public function refundSaldo(int $id){
        $user = User::findOrFail($id);

        return view('users.refundsaldo', [
            "user"=>$user,
        ]);
    }

    public function refundSaldop(int $id, Request $request){
        $validator = Validator::make($request->all(), [
            'change'=>'required',
            'reason'=>'required',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();
        
        $user = User::findOrFail($id);
        
        if($user->saldoBalance < $validated['change']){
            return redirect()->back();
        }

        $user->saldoBalance -= $validated['change'];
        $user->save();
        
        RefundSaldo::dispatch($user->id, $validated['reason']);
        
        return redirect()->route('pengguna');
    }

    public function resetpassword(int $id){
        $user = User::findOrFail($id);

        return view('users.resetpassword', [
            "user"=>$user,
        ]);
    }

    public function resetpasswordp(int $id, Request $request){
        $validator = Validator::make($request->all(), [
            'newpassword' => 'required|min:8|max:128',
        ]);

        $validated = $validator->validated();
        
        $user = User::findOrFail($id);
        
        $user->password = $validated['newpassword'];

        $user->save();
        
        return redirect()->route('pengguna');
    }

}
