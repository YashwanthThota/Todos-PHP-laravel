@extends('layout')

@section('content')


<div class="row">
  <div class="col-lg-12">
   <form action="{{ route('todos.save', ['id' => $todo->id]) }}" method="post">
     {{ csrf_field() }}<!--it enables the anti-forgery token-->
     <!--get the data from the controller and display int he text box-->
     <input type="text" class="form-control input-lg" name="todo" value="{{ $todo->todo }}" placeholder="Update Todo"/>
   </form>
  </div>
</div>

@stop
