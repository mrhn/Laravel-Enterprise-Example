<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CardController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse();
    }

    public function show(): JsonResponse
    {
        return new JsonResponse();
    }

    public function store(): JsonResponse
    {
        return new JsonResponse(null, 201);
    }

    public function update(): JsonResponse
    {
        return new JsonResponse();
    }

    public function destroy(): JsonResponse
    {
        return new JsonResponse(null, 204);
    }
}
