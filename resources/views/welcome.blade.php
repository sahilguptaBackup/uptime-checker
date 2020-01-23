<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{env('APP_NAME')}} | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Uptime Checker</h1>
  <p>Check your uptime!</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">All Sites</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact us</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-md-12">
        <form method="post" action="{{route('uptime.save')}}">
        @csrf
            <div class="form-row">  
                <div class="form-group col-md-3">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group col-md-3">
                    <label for="site-name">Site name</label>
                    <input type="text" class="form-control" id="site-name" placeholder="Site Name" name="site_name">
                </div>
                <div class="form-group col-md-3">
                    <label for="site-name">Site url</label>
                    <input type="text" class="form-control" id="site-name" placeholder="Site URL" name="site_url">
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <hr class="d-sm-none">
    </div>
    <div class="col-md-12">
    <table class="table">
        <thead class='thead-dark'>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Site name</th>
                <th scope="col">Site URL</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $key => $site)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$site['email']}}</td>
                <td>{{$site['site_name']}}</td>
                <td>{{$site['site_url']}}</td>
                <td>{{$site['created_at']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
  </div>
</div>
</body>
</html>
