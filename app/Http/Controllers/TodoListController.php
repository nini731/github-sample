<?php

namespace App\Http\Controllers;

use App\ToDos;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index() {
        $toDos = ToDos::all();
        //dd($toDos);
        return view('todos.index')->with(['issues'=>$toDos]);
    }

    public function create(Request $request) {
        $toDos = new ToDos();
        $toDos->issue = $request['issue'];
        $toDos->save();
        return redirect()->back()->with('info',"Issue have been created.");
    }

    public function update(Request $request) {
        $toDo = ToDos::whereId($request['id'])->first();
        $toDo->issue = $request['issue'];
        $toDo->update();
        return redirect()->back()->with('info',"Issue have been updated.");
    }

    public function delete($id) {
        $toDo = ToDos::whereId($id)->firstOrFail();
        $toDo->delete();
        return redirect()->back()->with('info',"Issue have been deleted.");
    }

    public function done($id, $done) {
        $toDo = ToDos::whereId($id)->first();
        $toDo->done = $done;
        $toDo->update();
        return redirect()->back();
    }
}
