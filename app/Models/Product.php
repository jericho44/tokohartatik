<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'user_id',
        'sku',
        'type',
        'name',
        'slug',
        'price',
        'weight',
        'length',
        'height',
        'width',
        'short_description',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productInventory()
    {
        return $this->hasOne(ProductInventory::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function variants()
    {
        return $this->hasMany(Product::class, 'parent_id')->orderBy('price', 'ASC');
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function productAttributeValues()
    {
        return $this->hasMany(ProductAttributeValue::class, 'parent_product_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class)->orderBy('id', 'DESC');
    }

    public static function statuses()
    {
        return [
            0 => 'Draft',
            1 => 'Active',
            2 => 'Inactive'
        ];
    }

    public static function types()
    {
        return [
            'simple' => 'Simple',
            'configurable' => 'Configurable',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1)
            ->where('parent_id', null)
            ->orderBy('created_at', 'desc');
    }

    public function priceLabel()
    {
        return ($this->variants()->count() > 0) ? $this->variants()->first()->price : $this->price;
    }

    public function configurable()
    {
        return $this->type == 'configurable';
    }

    public function simple()
    {
        return $this->type == 'simple';
    }

    public static function getQtyOptions($product)
    {
        // $qtyOptions = [];
        $productIDs = $product->variants->pluck('id');
        $qty = ProductInventory::where('product_id', $productIDs)->first();

        // foreach ($product->variants as $variant) {
        //     $qtyOptions[$variant->id] = $variant->productInventory->qty;
        // }

        return $qty;
    }
}
