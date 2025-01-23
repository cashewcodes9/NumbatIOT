<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
class BaseController
{
    /**
     * Send response method
     *
     * @param $result
     * @param $message
     * @return JsonResponse
     */
    public function sendResponse($result, $message): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * Send error response method
     *
     * @param string $error
     * @param string $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendError(string $error, string $errorMessages = '', int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
