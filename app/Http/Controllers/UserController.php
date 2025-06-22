<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json([
            'message' => count($user) . ' User founded',
            'data' => $user,
            'status' => true
        ], 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user != null) {
            return response()->json([
                'message' => 'Record is founded',
                'data' => $user,
                'status' => true
            ], 200);
        } else {
            return response()->json([
                'message' => 'Record is founded',
                'data' => [],
                'status' => true
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Please fix the errors',
                'errors' => $validator->errors(),
                'status' => false
            ], 200);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'message' => 'User add successfully',
            'data' => $user,
            'status' => true
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                'message' => 'User not found',
                'status' => false
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Please fix the errors',
                'errors' => $validator->errors(),
                'status' => false
            ], 422);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user,
            'status' => true
        ], 200);
    }
}
