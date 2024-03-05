<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('welcome', ['todos' => $todos]);
    }
    public function store(Request $request){
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        Todo::create($attributes);
        
        return redirect('/');
    }
    public function toggle(Todo $todo){
        $todo->isDone = !$todo->isDone;
        $todo->save();
        return redirect('/');
    }

    public function delete(Todo $todo){
        $todo->delete();
        return redirect('/');
    }
    
}
