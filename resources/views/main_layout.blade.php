<!DOCTYPE html>
<html>
<head>
    <title>To do App</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-yAYSLJjzniZh9Kau9E1v1ma5CzvyHF8fPK/xUpaRx1XTH9r60WxzDivvHG3xm6Hn" crossorigin="anonymous">
</head>
<body>
    
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="/">Toltaly</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto align-left pull-right">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
              </li>
              @if(Auth::check())
                <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
              @else
                <li class="nav-item">
                <a class="nav-link" href="/signup">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/signin">Sign In</a>
              </li>
              @endif
              
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form> -->
          </div>
        </nav>
<div class="container">
	@yield('content')
</div>
<div class="fluid-container">
    @yield('second')
</div>
<br><br>
<div class="fluid-container">
  <center>
    &copy {{ date('Y')}} All rights reserved.
  </center>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>