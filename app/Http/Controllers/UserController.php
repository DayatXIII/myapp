<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ];

        $messages = [
            'name.required' => 'You need to enter your name',
            
            'email.required' => 'You need to enter your email',
            'email.email' => 'Please enter valid email',
            
            'password.required' => 'You need to enter your password',
            'password.confirmed' => 'Password confirmation is not the same',

        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false, 
                'message' => $validator->messages()->first()
            ]);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return response()->json($user);
    }

    public function index(Request $request)
    {
        $users = User::all();
        return response()->json($users);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->save();
        return response()->json($user);
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function view(Request $request, $id)
    {
        $user = User::find($id);

        return response()->json($user);
    }
}
