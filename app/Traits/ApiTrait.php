<?php

namespace App\Traits;

trait ApiTrait
{

    public function responseSuccess($status = 200, $message = 'Success', $data = []) {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public function responseFail($status = 422, $message = 'Error', $data = []) {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public function responseCustom($status, $message, $data) {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $status);
    }

}
