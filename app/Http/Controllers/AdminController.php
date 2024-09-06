<?php

namespace App\Http\Controllers;

use App\Models\QRList;
use App\Models\QRLog;
use App\Models\SampahPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginview(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function home(){
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $dailySampahTransaction = SampahPengguna::whereDate('created_at', $today)->count();
        $monthlySampahTransaction =SampahPengguna::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $yearlySampahTransaction = SampahPengguna::whereBetween('created_at', [$startOfYear, $endOfYear])->count();

        $verifiedTransaction = SampahPengguna::where('isApproved', true)->count();
        $declinedTransaction = SampahPengguna::where('isDeclined', true)->count();
        $waitingTransaction = SampahPengguna::where('isApproved', false)->where('isDeclined', false)->count();

        $qrcount = QRList::count();
        $dailyQRScan = QRLog::whereDate('created_at', $today)->count();
        $monthlyQRScan = QRLog::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();


        return view("home",[
            'dailySampahTransaction' => $dailySampahTransaction,
            'monthlySampahTransaction' => $monthlySampahTransaction,
            'yearlySampahTransaction' => $yearlySampahTransaction,

            'verifiedTransaction' => $verifiedTransaction,
            'declinedTransaction' => $declinedTransaction,
            'waitingTransaction' => $waitingTransaction,

            'qrcount' => $qrcount,
            'dailyQRScan' => $dailyQRScan,
            'monthlyQRScan' => $monthlyQRScan,
        ]);
    }

    public function logout(Request $request){
        $user = $request->user();
        // $user->tokens()->delete();
        return redirect()->route('login');
    }

}
