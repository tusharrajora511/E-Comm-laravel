@extends('master')
@section('content')
<div class="container custom-product">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($products as $item)
              <div class="carousel-item active" {{$item['id']==1 ? 'active' : ''}}>
                <a href="detail/{{$item['id']}}">
                  <img class ="slider-img" src="{{$item['gallery']}}" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>{{$item['name']}}</h5>
                    <p>{{$item['description']}}</p>
                  </div>
                </a>
                
            </div>
            @endforeach
              </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
          <br><br>

    <div class="trending-wrapper">
    <h1>Trending Products</h1>

    <div class="">
        @foreach($products as $item)
      <div class="trending-item">
        <a href="detail/{{$item['id']}}">

          <img class ="trending-img" src="{{$item['gallery']}}">
          <div class="">
            <h3>{{$item['name']}}</h5>
            </a>

          </div>
        
    </div>
    @endforeach
      </div>

</div>
          
          
</div>
@endsection