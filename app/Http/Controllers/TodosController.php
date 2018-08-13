<?php

namespace App\Http\Controllers;


use Session;
//importing the model(providers)
use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
      //it imports the todo class from provides and all() is a method to access the data
      $todos = Todo::all();

     //we are assiging the data to todo variable and sending it to the view
      return view('todos')->with('todos',$todos);
    }

    public function store(Request $request)
    {
      //dd($request->all());

     //create instance of Todo class in Todo model
      $todo = new Todo;

    //this means $todo(instance of Todo) -> todo(todo column)
    //$request means submitted data and todo means request-> todo data
      $todo->todo = $request->todo;
   //save data in the database
      $todo->save();

      Session::flash('success', 'Your todo was created.');
      return redirect()->back();
    }

    public function delete($id) {
      //it will use the todo call int he Todo model to find the element
      $todo = Todo::find($id);

      Session::flash('success', 'Your todo was deleted.');
      $todo->delete();

      return redirect()->back();
    }

//get the todo data and forward it to update view
    public function update($id) {

    $todo = Todo::find($id);


    return view('update')->with('todo', $todo);

    }

    //get the data from the update view and save it
    public function save(Request $request, $id){
      //dd($request->all());
      $todo = Todo::find($id);

      $todo->todo = $request->todo;

      $todo->save();

     Session::flash('success', 'Your todo was updated');
      return redirect()->route('todos');
    }

//mark the todo as completed
      public function completed($id){
      //dd($request->all());
      $todo = Todo::find($id);

      $todo->completed = 1;

      $todo->save();
      Session::flash('success', 'Your todo was marked as completed.');
      return redirect()->route('todos');
    }
}
