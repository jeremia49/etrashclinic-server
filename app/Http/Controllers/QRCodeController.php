<?php

namespace App\Http\Controllers;

use App\Models\QRList;
use App\Models\QRLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QRCodeController extends Controller
{    
    public function qrcode(){
        $qrcodes = QRList::all();

        return view('qrcode.index', [
            "qrcodes"=>$qrcodes,
        ]);
    }
    
    public function addqrcode(){
        return view('qrcode.add');
    }

    public function addqrcodep(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'message'=>'required',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();

        $qrcode = new QRList();
        $qrcode->author = auth()->user()->id;
        $qrcode->title = $validated['title'];
        $qrcode->message = $validated['message'];
        $qrcode->uniqid = Str::orderedUuid();
        $qrcode->save();
        
        
        return redirect()->route('qrcode');
    }
    public function viewqrcode(int $id){
        $qrcode = QRList::findOrFail($id);
        $qrcodelog = QRLog::select("table_qr_log.*", "users.name", "users.email", )
        ->where('qrid',$id)
        ->join("users","table_qr_log.user", "=", "users.id")
        ->get();

        return view('qrcode.view',[
            'data' => $qrcode,
            'logs'=>$qrcodelog,
        ]);
    }

    public function editqrcode(int $id){
        $qrcode = QRList::findOrFail($id);
        return view('qrcode.edit',[
            "id"=>$id,
            'data' => $qrcode,
        ]);
    }

    public function editqrcodep(int $id, Request $request){
        
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'message'=>'required',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back();
        }

        $validated = $validator->validated();

        $qrcode = QRList::findOrFail($id);
        $qrcode->title = $validated['title'];
        $qrcode->message = $validated['message'];
        $qrcode->save();
        
        return redirect()->route('qrcode');
    }

    public function deleteqrcode(int $id){
        $qrcode = QRList::findOrFail($id);
        $qrcode->delete();
        return redirect()->route('qrcode');
    }

    public function scanqrcode(string $id, Request $request){
        $qrcode = QRList::where('uniqid',$id)->first();

        $validator = Validator::make($request->all(), [
            'userID'=>'required|integer',
        ]);

        $validated = $validator->validated();
        if ($validator->fails()) {
            return redirect()->route('home');
        }

        $qrlog = new QRLog();
        $qrlog->user = $validated['userID'];
        $qrlog->qrid = $qrcode->id;
        $qrlog->save();

        return "Berhasil scan QR";
    }

    public function qrlog(){
        $qrcodelog = QRLog::select("table_qr_log.*", "users.name", "users.email", "table_qr_list.title")
        ->join("users","table_qr_log.user", "=", "users.id")
        ->join("table_qr_list","table_qr_log.qrid", "=", "table_qr_list.id")
        ->get();

        return view('qrcode.qrlog',[
            'logs'=>$qrcodelog,
        ]);
    }

}
