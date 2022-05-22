<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_product_id',
        'product_id',
        'attribute_id',
        'text_value',
        'boolean_value',
        'integer_value',
        'float_value',
        'datetime_value',
        'date_value',
        'json_value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public static function getAttributeOptions($product, $attributeCode)
    {
        $productVariantIDs = $product->variants->pluck('id');
        $attribute = Attribute::where('code', $attributeCode)->first();

        $attributeOptions = ProductAttributeValue::where('attribute_id', $attribute['id'])
            ->whereIn('product_id', $productVariantIDs)
            ->get();

        return $attributeOptions;
    }
}
