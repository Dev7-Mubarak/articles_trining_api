<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function success(
        mixed $data = null,
        string $message = 'Success',
        int $status = 200
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
            'errors'  => null,
        ], $status);
    }

    protected function error(
        string $message = 'Error',
        mixed $errors = null,
        int $status = 400
    ): JsonResponse {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => null,
            'errors'  => $errors,
        ], $status);
    }

    protected function paginatedSuccess(
        mixed $resource,
        string $message = 'Success',
        int $status = 200
    ): JsonResponse {
        $response = $resource->response()->getData(true);

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $response['data'],
            'pagination' => [
                'current_page' => $response['meta']['current_page'],
                'last_page'    => $response['meta']['last_page'],
                'per_page'     => $response['meta']['per_page'],
                'total'        => $response['meta']['total'],
            ],
            'errors'  => null,
        ], $status);
    }
}
