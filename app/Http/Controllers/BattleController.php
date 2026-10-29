<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Battle;
use App\Services\BattleEngine;
use Illuminate\Http\Resources\Json\JsonResource;

class BattleController extends Controller
{
    public function store(): JsonResponse{
        $engine = new BattleEngine();
        $battle = $engine->simulate();
        $battle->load('logs');
        return response()->json($battle, 201);
    }

    public function index():JsonResponse{
        $battles = Battle::latest()->get();

        return response()->json($battles);
    }

}
