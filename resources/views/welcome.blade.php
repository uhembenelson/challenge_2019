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
@if($message = Session::get('error'))
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Oh snap!</strong> {{ $message }}.
    </div>
@endif

@if($message = Session::get('success'))
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Well done!</strong> {{ $message }}.
    </div>
@endif
<br><br>
<div class="clearfix"></div>
<form action="" method="post">
    {{ csrf_field() }}
  <fieldset>
    <legend>Todo List</legend>
    <div class="form-group">
      <label for="exampleTextarea">Enter "to do" information here</label>
      <textarea class="form-control" id="todo" name="todo" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </fieldset>
</form>
<br><br>
<div class="clearfix"></div>
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">To Do</th>
      <th scope="col">Status</th>
      <th scope="col">Date Created</th>
      <th scope="col">Date Completed</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php $sn = 1 @endphp
    @if($todos)
        @foreach($todos as $list)
          <tr>
            <td>{{  $sn++ }}</td>
            <td>{{ $list->todo }}</td>
            <td>
                @if($list->status == 1)
                    <span class="text-warning"><b>{{ ucwords($list->typename) }}</b></span>
                @elseif($list->status == 2)
                    <span class="text-danger"><b>{{ ucwords($list->typename) }}</b></span>
                @elseif($list->status == 3)
                    <span class="text-success"><b>{{ ucwords($list->typename) }}</b></span>
                @endif
             </td>
             <td>{{ $list->timecreated }}</td>
             <td>{{ $list->timecompleted }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-info btn-xs">Action</button>
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop2" type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop2" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                    @if($list->status == 1 || $list->status == 2)
                    <a class="dropdown-item" href="/completed/{{$list->id}}">Completed</a>
                    <a class="dropdown-item"  href="/edit/{{$list->id}}">Edit</a>
                    @elseif($list->status == 3)
                    <a class="dropdown-item" href="/cancel/{{ $list->id }}" >Cancelled</a>
                    @endif
                  </div>
                </div>
              </div>
            </td>
            <tr>
        @endforeach
    @else
    <tr>
      <td colspan="100%"><center>No To Do</center></td>
    </tr>
    @endif
  </tbody>
</table>
@endsection
