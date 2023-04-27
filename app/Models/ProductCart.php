<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCart extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','user_id','total_quantity'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productReview(){
        return $this->hasMany(ProductReview::class);
    }
}
