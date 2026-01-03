<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::latest()->paginate(10),
        ]);
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
        $data = $request->validate([
            'name'     => 'required',
            'color'    => 'required',
            'category' => 'required',
            'type'     => 'required',
            'price'    => 'required|numeric',
            'image'    => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
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
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'     => 'required',
            'color'    => 'required',
            'category' => 'required',
            'type'     => 'required',
            'price'    => 'required|numeric',
            'image'    => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return back()->with('success', 'Product berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }

    public function report()
    {
        abort_if(
            ! auth()->check() || ! auth()->user()->hasRole('owner'),
            404
        );

        $stockMovements = StockMovement::with('product')->latest()->paginate(10);


        return view('report/index',  [
            'labels'    => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            'product'   => [5, 10, 3, 12, 8, 11, 6, 10, 14, 7],
            'resources' => [3, 6, 2, 7, 4, 6, 3, 7, 8, 4],
            'values'    => [120, 200, 150, 300, 250],
            'stockMovements'  => $stockMovements
        ]);
    }
}
