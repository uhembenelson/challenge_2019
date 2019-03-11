@extends('main_layout')
@section('content')
<center>
<form action="" method="post">
<legend>Signup</legend>
{{ csrf_field() }}
<div class="col-md-4">
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
      <script> setTimeout(function (){ window.location.assign('/signin')}, 3000);</script>
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

<div class="form-group">
  <fieldset >
    <label class="control-label" for="disabledInput">Fullname</label>
    <input class="form-control" autocomplete="off" name="name" type="text" required placeholder="e.g. Samuel Ezedi">
  </fieldset>
</div>

<div class="form-group">
  <fieldset>
    <label class="control-label" for="readOnlyInput">Email</label>
    <input class="form-control"  autocomplete="off" name="email" type="email" required placeholder="e.g. hello@samuelezedi.com" >
  </fieldset>
</div>

<div class="form-group">
  <label class="form-control-label" for="inputSuccess1">Password</label>
  <input type="password" class="form-control "  required name="password">
  <div class="valid-feedback" style="display: none">Success! You've done it.</div>
</div>

<div class="form-group ">
  <label class="form-control-label" for="inputDanger1">Re-Type Password</label>
  <input type="password" class="form-control"  required name="rpass">
  <div class="invalid-feedback" style="display: none">Sorry, that username's taken. Try another?</div>
</div>

 <div class="form-group">
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck2" name="notify">
      <label class="custom-control-label" for="customCheck2">Subscribe for notifications of your to do lists.</label>
    </div>
  </div>
<button type="submit" class="btn btn-primary col-md-12">Join</button>
<div >Already have an account<a href="/signin"> Sign in</a></div>
</div>
</form>
</center>
@endsection