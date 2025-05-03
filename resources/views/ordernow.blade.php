@extends('master')
@section('content')
<div class="container custom-product">
    <div class="cart-list">
    <table class="table table-bordered">
  <tbody>
    <tr>
      <td>Price</td>
      <td>{{$total}} INR</td>
    </tr>
    <tr>
      <td>Tax</td>
      <td>{{$tax}}INR</td>
    </tr>
    <tr>
      <td>Delivery Charges</td>
      <td>{{$delivery}} INR</td>
    </tr>
    <tr>
      <td>Total Price</td>
      <td>{{$totalamount}} INR</td>
    </tr>

  </tbody>
</table>

    <form action="/orderplace" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="address" placeholder="Enter your address" class="form-control"></textarea>
            <br>
            <input type="hidden" name="total" value="{{$totalamount}}">
            <input type="hidden" name="tax" value="{{$tax}}">
            <input type="hidden" name="delivery" value="{{$delivery}}">
            <input type="hidden" name="price" value="{{$total}}">
            <input type="hidden" name="user_id" value="{{Session::get('user')['id']}}">
            <br>
            <input type="text" name="phone" placeholder="Enter your phone number" class="form-control"><br><br>
            <input type="text" name="name" placeholder="Enter your name" class="form-control"><br><br>
            <input type="text" name="email" placeholder="Enter your email" class="form-control"><br><br>
            <h3>Enter your payment method</h2><br><br>
            <input type="radio" name="payment" value="cash" class="form-check-input">Cash on Delivery<br><br>
            <input type="radio" name="payment" value="online" class="form-check-input">Online Payment<br><br>
            <input type="radio" name="payment" value="upi" class="form-check-input">UPI Payment<br><br>
            <input type="radio" name="payment" value="card" class="form-check-input">Card Payment<br><br>
            <input type="radio" name="payment" value="netbanking" class="form-check-input">Net Banking<br><br>
            <input type="radio" name="payment" value="wallet" class="form-check-input">Wallet Payment<br><br>
            <input type="radio" name="payment" value="emi" class="form-check-input">EMI Payment<br><br>
            <input type="radio" name="payment" value="other" class="form-check-input">Other Payment<br><br>
            <br>
            <input type="checkbox" name="terms" class="form-check-input" required>I agree to the terms and conditions<br>
            <br><br>
            <button type="submit" class="btn btn-success">Order Now</button>
        </div>
    </div>
    @endsection