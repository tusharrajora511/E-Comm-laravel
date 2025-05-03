<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;


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
            return Cart::where('user_id', $user_id)->count();
        } else {
            return 0;
        }
    }
    


}
