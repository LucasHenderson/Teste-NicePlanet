<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste() {
        return "Se vc está lendo isso significa que o token está valido!";
    }
}
