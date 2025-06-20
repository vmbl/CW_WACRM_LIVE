<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AiController extends Controller
{
    //Sample REST API
    public function index() {
        $sampleResponse = "Hi";
        return response()->json(["success" =>  true, "message" => "Laravel API"]);
    }
}
