@extends('master')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="{{$product['gallery']}}" class="img-fluid" alt="{{$product['name']}}">
        </div>
        <div class="col-md-6">
            <a href="/">Go Back</a>
            <h2>{{$product['name']}}</h2>
            <h4>Price: {{$product['price']}}</h4>
            <p>{{$product['description']}}</p>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                <button type="submit" class="btn btn-success">Add to Cart</button>
                <br><br>
                <button type="button" class="btn btn-primary">Buy Now</button>
            </form>
        </div>
    </div>
          
          
</div>
@endsection