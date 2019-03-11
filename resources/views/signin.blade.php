@extends('main_layout')
@section('content')
<center>
<form action="" method="post">
<legend>Signin</legend>
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
  <fieldset>
    <label class="control-label" for="readOnlyInput">Email</label>
    <input class="form-control" autocomplete="off" name="email" type="email" placeholder="e.g. hello@samuelezedi.com" >
  </fieldset>
</div>

<div class="form-group">
  <label class="form-control-label" for="inputSuccess1">Password</label>
  <input type="password" autocomplete="off" class="form-control"  name="password">
  <div class="valid-feedback" style="display: none">Success! You've done it.</div>
</div>

 <div class="form-group">
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck2" name="remember">
      <label class="custom-control-label" for="customCheck2">Remember Me</label>
    </div>
  </div>
<button type="submit" class="btn btn-primary col-md-12">Sign in</button>
<div >Don't have an account<a href="/signup"> Sign up </a></div>
@if(Auth::check())
  <script> setTimeout(function (){ window.location.assign('/')}, 3000);</script>
@endif
</div>
</form>
</center>
@endsection