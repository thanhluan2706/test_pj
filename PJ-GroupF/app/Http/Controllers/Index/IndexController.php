<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return DB::table('Products')
        // ->where('id', 11)
        // ->get();
        $data = DB::table('Products')
            ->get();
        return view('index.index', ['data' => $data]);
    }

    // //CART
    public function cart()
    {
        return view('index.cart');
    }

    public function addToCart($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
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
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function removeProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    // //Wishlist
    public function wish()
    {
        return view('index.wish-list');
    }

    public function addToWishList($id)
    {
        $product = Products::findOrFail($id);

        $wish = session()->get('wish', []);

        if (isset($wish[$id])) {
            $wish[$id]['quantity']++;
        } else {
            $wish[$id] = [
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

        session()->put('wish', $wish);
        return redirect()->back()->with('success', 'Product add to wish successfully!');
    }

    public function updateWishList(Request $request)
    {
        if ($request->id && $request->quantity) {
            $wish = session()->get('wish');
            $wish[$request->id]["quantity"] = $request->quantity;
            session()->put('wish', $wish);
            session()->flash('success', 'successfully updated!');
        }
    }

    public function removeWishList(Request $request)
    {
        if ($request->id) {
            $wish = session()->get('wish');
            if (isset($wish[$request->id])) {
                unset($wish[$request->id]);
                session()->put('wish', $wish);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    //About Us
    public function aboutUs()
    {
        return view('index.about-us');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
