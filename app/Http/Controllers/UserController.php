<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () {
        $user = User::all();
        return response()->json([
            'message' => count($user).' User founded',
            'data' => $user,
            'status' => true
        ], 200);
    }

    public function show ($id) {
        $user = User::find($id);
        if ($user != null) {
            return response()->json([
                'message' => 'Record is founded',
                'data' => $user,
                'status' => true
            ]);
        }else {
            return response()->json([
                'message' => 'Record is founded',
                'data' => [],
                'status' => true
            ]);
        }
    }
}
