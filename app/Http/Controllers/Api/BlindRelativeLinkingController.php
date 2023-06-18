<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mockery\Exception;

class BlindRelativeLinkingController extends Controller
{
    use ApiTrait;

    public function linkedProfile(){
        $user = auth('api')->user();
        if ($user->type == "BLIND"){
            if ($user->relative_id)
                return $this->responseSuccess(200 , "Success" , UserResource::make($user->relative));
            return $this->responseFail(422 , "No Relative Yet");
        }
        else{
            if ($user->blind)
                return $this->responseSuccess(200 , "Success" , UserResource::make($user->blind));
            return $this->responseFail(422 , "No Blind Yet");
        }
    }

    public function scanQr(Request $request){
        try {
            User::find($request['blind_id'])->update([
                'relative_id' => \auth('api')->user()->id
            ]);
            return $this->responseSuccess(200 , "Blind Qr Scanned");
        }catch (Exception $e){
            return $this->responseFail(422 , "Something Went Wrong !");
        }
    }

    public function sendLocation(Request $request){
        $user = auth('api')->user();
        if (!$user->relative)
            return $this->responseFail(422 , "No Relative To This User Yet");

        $data = [
            'to' => auth('api')->user()->relative->fcm_token,
            'notification' => [
                'title' => "Location Shared",
                'body' => auth('api')->user()->name . "Sent His Location"
            ],
            'data' => [
                'latitude' => $request['latitude'],
                'longitude' => $request['longitude'],
            ]
        ];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer AAAApW6S2fY:APA91bFG4bdanTIf3CxSP6041ES2RdyW8834hwqz2BfcVYWkufO3w9b5pxU7-atUMNqbNGzz-YiS6V38kNJFf7QtWsKSARX4-2_KlyCa9fd2fCutsxV4fyZrK6WkNDFo3zykRAbCdq6o',
            'Content-Type' => 'application/json',
        ])->post('https://fcm.googleapis.com/fcm/send', $data);

        return $response;
        if ($response->successful()) {
            return $this->responseSuccess(200 , 'Location Sent To Relative');
        }

        return $this->responseFail(422 , "Something Went Wrong !");
    }
}
