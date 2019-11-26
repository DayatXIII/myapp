<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $todo = new Todo();

        $todo->name = $request->name;
        $todo->task = $request->task;
        $todo->user_id = 2;

        $todo->save();

        return response()->json($todo); 
    }

    // public function index()
    // {
    //     $todos = Todo::all();
    //     return $todos;
    // }

    // public function index(Request $request, $user_id)
    // {
    //     $user = User::with('todos')->find($user_id);
    //     return response()->json($user->todos); 
    // }

    public function index(Request $request, $user_id)
    {
        //get an array of objects
        //$todos = Todo::where('user_id', $user_id)->get();

        //get single object
        $todos = Todo::where('user_id', $user_id)->first();
        
        return response()->json($todos); 
    }
}
