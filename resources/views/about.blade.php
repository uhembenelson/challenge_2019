@extends('main_layout')
@section('second')
<div class="jumbotron">
  <h1 class="display-3">Hello, Welcome to Toltaly</h1>
  <p class="lead">This is a simple web to do list application, no long stories, this is what we do.</p>
  <hr class="my-4">
  <p>This App is built and Maintained by <a href="http://samuelezedi.com" >Samuel Ezedi</a></p>
  <p class="lead">
  	@if(Auth::check())
    	<a class="btn btn-primary btn-lg" href="/" role="button">Get Started!</a>
    @else
    	<a class="btn btn-primary btn-lg" href="/signup" role="button">Join Now for Free!</a>
    @endif
  </p>
</div>
<div class="container">
<h2>About Toltaly</h2><br>
<p>Toltaly is a simple web application which allows user create realtime to do list. Its main vision is to see that people can easily access a todo list with or without a mobile phone anywhere around the world. At Toltoly we are committed to providing this basic service free of charge and consistently</p>
</div>
@endsection