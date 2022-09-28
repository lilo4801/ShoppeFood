<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseApiController extends Controller
{

    public function sendError(array $data = [], string $message = 'failure', int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json(self::formatResponse($statusCode, $message, $data), $statusCode);
    }

    public function sendSuccess(array $data = [], string $message = 'success', int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return response()->json(self::formatResponse($statusCode, $message, $data), $statusCode);
    }

    public static function formatResponse(int $statusCode, string $message, array $data = []): array
    {
        return [
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data,
        ];
    }
}
