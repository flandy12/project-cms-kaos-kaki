<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'quantity',
        'stock_before',
        'stock_after',
        'note',
    ];
    
    protected $casts = [
        'quantity'      => 'integer',
        'stock_before'  => 'integer',
        'stock_after'   => 'integer',
    ];

    /**
     * Konstanta type movement
     */
    public const TYPE_IN  = 'in';
    public const TYPE_OUT = 'out';

    /**
     * Relasi ke Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Scope: hanya stock masuk
     */
    public function scopeIn($query)
    {
        return $query->where('type', self::TYPE_IN);
    }

    /**
     * Scope: hanya stock keluar
     */
    public function scopeOut($query)
    {
        return $query->where('type', self::TYPE_OUT);
    }
}
