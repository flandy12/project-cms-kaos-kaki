<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $year = now()->year;

        /**
         * ===========================
         * DATA BULANAN (CHART)
         * ===========================
         */
        $monthlyIncome = StockMovement::query()
            ->from('stock_movements as sm')
            ->join('products as p', 'p.id', '=', 'sm.product_id')
            ->where('sm.type', 'out')
            ->whereYear('sm.created_at', $year)
            ->selectRaw('
        MONTH(sm.created_at) as month,
        SUM(sm.quantity * p.price) as total_income,
        SUM(sm.quantity) as total_sold
    ')
            ->groupByRaw('MONTH(sm.created_at)')
            ->orderByRaw('MONTH(sm.created_at)')
            ->get();

        /**
         * FORMAT UNTUK CHART (JAN–DES)
         */
        $months = [];
        $incomeData = [];
        $soldData = [];

        for ($m = 1; $m <= 12; $m++) {
            $row = $monthlyIncome->firstWhere('month', $m);

            $months[]     = Carbon::create()->month($m)->format('M');
            $incomeData[] = (int) ($row->total_income ?? 0);
            $soldData[]   = (int) ($row->total_sold ?? 0);
        }

        /**
         * ===========================
         * DATA TABEL LAPORAN
         * ===========================
         */
        $stockMovements = StockMovement::with('product')
            ->where('type', 'out')
            ->latest()
            ->paginate(10);

        /**
         * ===========================
         * RETURN VIEW
         * ===========================
         */
        return view('report.index', [
            'months'         => $months,
            'monthlyIncome'  => $incomeData,
            'monthlySold'    => $soldData,
            'avgPrice'       => Product::avg('price'),
            'stockMovements' => $stockMovements,
        ]);
    }

    public function incomeByDate(Request $request)
    {
        $request->validate([
            'start' => 'required|date',
            'end'   => 'required|date|after_or_equal:start',
        ]);

        $data = DB::table('orders')
            ->selectRaw('DATE(created_at) as date, SUM(total) as income')
            ->whereBetween('created_at', [
                Carbon::parse($request->start)->startOfDay(),
                Carbon::parse($request->end)->endOfDay(),
            ])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json([
            'categories' => $data->pluck('date'),
            'series' => $data->pluck('income'),
        ]);
    }
}
