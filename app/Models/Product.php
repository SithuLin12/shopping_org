<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\ProductAddTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','supplier_id','brand_id','name','image','discount_price','sale_price','total_quantity','view_count','like_count'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function color() {
        return $this->belongsToMany(Color::class,'product_color');
    }

    public function productAddTransaction() {
        return $this->hasMany(ProductAddTransaction::class);
    }

    public function productCart() {
        return $this->hasMany(ProductCart::class);
    }

    public function productOrder (){
        return $this->hasMany(ProductOrder::class);
    }
}
