<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class DemoController extends Controller
{
    public function index () {
        $array = [
               [ 'name' => 'Leader', 'email' => 'leader@gmail.com'],
               [ 'name' => 'Remen ', 'email' => 'remen@gmail.com'],
               [ 'name' => 'Pheakdy', 'email' => 'pheakdy@gmail.com'],
        ];

        return response()->json([
            'message' => 'Three user are found',
            'data' => $array,
            'status'=> true
        ], 200);
    }
}
