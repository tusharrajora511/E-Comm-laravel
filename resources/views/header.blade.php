<?php
use App\Http\Controllers\ProductController;
$total =0;
if(Session::has('user')){
  
$total =ProductController::cartItem();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">E-Comm</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Orders</a>
          </li>
        </ul>
  
        <form action="/search" class="d-flex me-3" role="search">
          <input class="form-control search-box" name="query" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
  
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Cart({{$total}})</a>
          </li>
          @if(Session::has('user'))
          <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
{{Session::get('user')['name']}}  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="/logout">Logout</a></li>
    <li><a class="dropdown-item" href="#">Page 1-2</a></li>
    <li><a class="dropdown-item" href="#">Page 1-3</a></li>
  </ul>
</li>
@else
<li><a class="nav-link" href="/login">Login</a></li>
@endif

        </ul>
        
      </div>
    </div>
  </nav>
  