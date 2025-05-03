@extends('master')
@section('content')
<div class="container custom-product">
    <div class="cart-list">
        <div class="row">
            <h2>Cart List</h2>
            <br><br><br>
            <div class="col-sm-10">
            <a href="/ordernow" class="btn btn-success">Order Now</a><br><br>
            <h3>Result for Products</h3>
            </div>
            <div class="col-sm-10">
                <table class="table">
                    <tbody>
                        @foreach($products as $item)
                        <tr>
                            <td>
                                <img class="cart-img" src="{{$item->gallery}}">
                            </td>
                            <td>
                                <div class="">
                                    <h3>{{$item->name}}</h3>
                                    <p>{{$item->description}}</p>
                                </div>
                            </td>
                            <td>
                                <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove to Cart</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection