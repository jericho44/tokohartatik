<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_id'];

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    public function scopeParentCategories($query)
    {
        return $query->where('parent_id', 0);
    }

    public static function childIds($parentId = 0)
    {
        $categories = Category::select('id', 'name', 'parent_id')->where('parent_id', $parentId)->get()->toArray();

        $childIds = [];
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $childIds[] = $category['id'];
                $childIds = array_merge($childIds, Category::childIds($category['id']));
            }
        }

        return $childIds;
    }
}
