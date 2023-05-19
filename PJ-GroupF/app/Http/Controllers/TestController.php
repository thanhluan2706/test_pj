<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return DB::table('Products')
        // ->where('id', 11)
        // ->get();

        // $product = Products::all();
        // return view('cart.products', compact('product'));
        
        $products = Products::all();
        return view('test-cart.products', compact('products'));
    }

    public function cart()
    {
        return view('test-cart.cart');
    }

    public function addToCart($id)
    {
        $product = Products::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "name" => $product->name,
                "manu_id" => $product->manu_id,
                "type_id" => $product->type_id,
                "price" => $product->price,
                "image" => $product->image,
                "description" => $product->description,
                "feature" => $product->feature,
                "quantity" => 1
            ];
        }
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
 
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function removeProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    // //CART
    // public function productCart()
    // {
    //     return view('cart.cart');
    // }
    // //Add to cart
    // public function addProductToCart($id)
    // {
    //     $product = Products::findOrFail($id);
    //     $cart = session()->get('cart', []);
    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $product->name,
    //             "quantity" => 1,
    //             "manu_id" => $product->manu_id,
    //             "type_id" => $product->type_id,
    //             "price" => $product->price,
    //             "image" => $product->image,
    //             "description" => $product->description,
    //             "feature" => $product->feature

    //         ];
    //     }
    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product has been added to cart!');
    // }

    // public function updateCart(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Product added to cart.');
    //     }
    // }
  
    // public function deleteProduct(Request $request)
    // {
    //     if($request->id) {
    //         $cart = session()->get('cart');
    //         if(isset($cart[$request->id])) {
    //             unset($cart[$request->id]);
    //             session()->put('cart', $cart);
    //         }
    //         session()->flash('success', 'Product successfully deleted.');
    //     }
    // }


}
