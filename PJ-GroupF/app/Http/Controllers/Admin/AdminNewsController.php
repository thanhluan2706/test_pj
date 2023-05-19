<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Manufactures;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::latest()->paginate(5);
        

        return view('admin.admin-index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'manu_id' => 'required',
            'type_id' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'feature' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Products::create($input);

        return redirect()->route('admin')
            ->with('success', 'Product created successfully.');
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
    public function edit(Products $products)
    {
        return view('admin.product-edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        $request->validate([
            'name' => 'required',
            'manu_id',
            'type_id',
            'price' => 'required',
            'description' => 'required',
            'feature' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $products->update($input);

        return redirect()->route('admin')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        $products->delete();

        return redirect()->route('admin')
            ->with('success', 'Product deleted successfully');
    }

    public function getManuByID()
    {
        // $data = DB::table('Products')->manufactures->get();
        // return view('admin.admin-index', ['data' => $data]);

        $data = Products::find(11);
        $data->manu()->where('manu_id', 1)->first();
        return $this->hasMany(Products::class, 'id');
    }

    public function getAllManu()
    {
        // $manufactures = Manufactures::latest()->get();
        // return view('admin.test', compact('manufactures'));

        $manu = DB::table('Manufactures')->get();
        return view('admin.product-add', ['manu' => $manu]);
        
        // return DB::table('Manufactures')
        // ->get();
    }

    public function test($id)
    {
        $manu = Manufactures::find($id);

        // dd($product);

        return view('admin.product-edit')->with('products', $manu);
    }

}
