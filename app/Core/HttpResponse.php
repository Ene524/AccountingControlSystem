<?php

namespace App\Core;

trait HttpResponse
{
    /**
     * @param bool $isSuccess
     * @param string $message
     * @param null $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function httpResponse($isSuccess = false, $message, $data = null, $statusCode)
    {
        if (!$message) return response()->json(['message' => 'Message is required'], 500);

        return response()->json([
            'message' => $message,
            'error' => !$isSuccess,
            'code' => $statusCode,
            'response' => $data
        ], $statusCode);
    }
}
