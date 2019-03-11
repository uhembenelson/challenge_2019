@extends('main_layout')
@section('content')
@if(count($errors) > 0)
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      @foreach($errors->all() as $error)
        <strong>{{ $error }}<br></strong>
      @endforeach
    </div>
@endif
@if($success !== "")
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Well done!</strong> {{ $success }}.
    </div>
@endif

@if($error !== "")
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Oh snap!</strong> {{ $error }}.
    </div>
@endif


<form action="" method="post">
    {{ csrf_field() }}
  <fieldset>
    <legend>Edit Todo List</legend>
    <div class="form-group">
      <label for="exampleTextarea">Enter "to do" information here</label>
      <textarea class="form-control" id="todo" name="todo" rows="3" >{{$todo}}</textarea>
      <input type="hidden" name="chosen" value="{{$chosen}}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </fieldset>
</form>
<br><br>
<div class="clearfix"></div>

@endsection
