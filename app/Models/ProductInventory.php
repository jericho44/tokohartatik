<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'qty',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function reduceStock($productId, $qty)
    {
        $inventory = self::where('product_id', $productId)->first();
        $inventory->qty = $inventory->qty - $qty;
        $inventory->save();
    }
}
