<?php

namespace App\Http\Controllers;

use App\Models\FCM;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required',
            'fcmToken'=>'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message'=> "Validation Error!",
                'reason' => $validator->errors()->messages(),
            ],400);
        }

        $validated = $validator->validated();

        if (
            Auth::attempt([
            'email'=>$validated['email'],
            'password'=>$validated['password']
            ])) {
                // $request->user()->tokens()->delete();

                $token = $request->user()->createToken("MOBILE_APP_KEY")->plainTextToken;

                return response()->json([
                    'status' => 'ok',
                    'message' => 'Anda telah berhasil masuk',
                    "reason"=>null,
                    "data"=>array(
                        "uid"=>$request->user()->id,
                        "name"=>$request->user()->name,
                        "email"=>$request->user()->email,
                        "nohp"=>$request->user()->nohp,
                        "photoUrl"=>$request->user()->photoUrl,
                        "access_token"=>$token
                    ),
                ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Wrong email / password',
                "reason"=>null,
            ],401);
        }

    }


    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'nohp'=>'required|string',
            'password'=>'required|min:8|max:128',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message'=>"Validation Error!",
                'reason' => $validator->errors()->messages(),
            ],400);
        }

        $validated = $validator->validated();

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->nohp = $validated['nohp'];
        $user->photoUrl = "https://gravatar.com/avatar/".md5($validated['email']);

        $result = $user->save();
        if($result){
            return response()->json([
                'status' => 'ok',
                'message' => 'Anda telah berhasil mendaftar',
                "reason"=>null,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occured',
                "reason"=>null,
            ],500);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        // $user->tokens()->delete();
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
        ]);
    }


    public function me(Request $request)
    {
        $user = $request->user();
        $checknotification = Notification::where('author', $user->id)->where('isRead', '0')->exists();
        $user['isNotificationExist'] = $checknotification;
        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$user,
        ]);
    }

    public function notifications(Request $request){
        $user = $request->user();
        $data = Notification::where('author', $user->id)->orderBy('created_at', 'desc')->get();

        Notification::where('author', $user->id)->update(['isRead' => '1']);

        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
            "data"=>$data,
        ]);

    }

    public function fcmToken(Request $request){
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'fcmToken'=>'required|string',
        ]);
        $validated = $validator->validated();

        $fcm = new FCM();
        $fcm->author = $user->id;
        $fcm->fcmToken = $validated['fcmToken'];
        $fcm->save();

        return response()->json([
            'status' => 'ok',
            'message' => 'Sukses',
            "reason"=>null,
        ]);
    }

}
