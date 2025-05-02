<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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


}
