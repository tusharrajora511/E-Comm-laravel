<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;


class ProductController extends Controller
{
    public function index(){
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    public function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }

    public function search(Request $request){

        $search = $request->input('query');
        $data = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('product', ['products' => $data]);
    }

    public function add_to_cart(Request $request){
        if($request->session()->has('user')){
            $cart = new Cart;
            $cart->user_id=$request->session()->get('user')['id'];
            $cart->product_id=$request->input('product_id');
            $cart->save();
            return redirect('/product');
        }else{
            return redirect('/login');
        }  
    
    }
    public static function cartItem()
    {
        if (Session::has('user')) {
            $user_id = Session::get('user')['id'];
            $cart = Cart::where('user_id', $user_id)->count();
            // dd($cart);
            return $cart;

        } else {
            return 0;
        }
    }
    public function cartList()
    {
        $user_id = Session::get('user')['id'];
        $data = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        ;
        return view('cartlist', ['products' => $data]);
    }
    
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }

    public function orderNow()
    {
        $user_id = Session::get('user')['id'];
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->sum('products.price');
            $delivery = 0.10 * $total; // 10% of total
            $tax = 0.18 * $total;      // 18% of total
            $totalamount = $total + $delivery + $tax;
            return view('ordernow', ['total' => $total, 'delivery' => $delivery, 'tax' => $tax, 'totalamount' => $totalamount]);
    }

    public function orderPlace(Request $request)
    {
        $user_id = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $user_id)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->address = $request->input('address');
            $order->phone = $request->input('phone');
            $order->product_name = Product::find($cart['product_id'])->name;
            $order->product_id = $cart['product_id'];
            $order->user_id = $user_id;
            $order->status = 'pending';
            $order->quantity = 1;
            $order->price = Product::find($cart['product_id'])->price;
            $order->payment_status = 'pending';
            $order->payment_method = 'cod';
            $order->save();
        }
        Cart::where('user_id', $user_id)->delete();
        return redirect('/product');
    }

    public function myOrders()
    {
        $user_id = Session::get('user')['id'];
        $orders = Order::where('user_id', $user_id)->get();
        return view('myorders', ['orders' => $orders]);
    }

    public function orderDetail($id)
    {
        $order = Order::find($id);
        return view('orderdetail', ['order' => $order]);
    }
}
