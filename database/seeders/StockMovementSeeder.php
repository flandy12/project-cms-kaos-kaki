<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::transaction(function () {

            $products = Product::all();

            foreach ($products as $product) {

                // Stock awal (bisa kamu sesuaikan)
                $initialStock = rand(20, 100);

                // Update stock di tabel products
                $product->update([
                    'stock' => $initialStock,
                ]);

                // Catat stock movement (IN)
                StockMovement::create([
                    'product_id'   => $product->id,
                    'type'         => StockMovement::TYPE_IN,
                    'quantity'     => $initialStock,
                    'stock_before' => 0,
                    'stock_after'  => $initialStock,
                    'note'         => 'Stock awal produk',
                ]);
            }
        });
    }
}
