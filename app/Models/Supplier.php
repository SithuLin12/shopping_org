<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductAddTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','description'];

    public function productAddTransaction() {
        return $this->hasMany(ProductAddTransaction::class);
    }

    public function supplier(){
        return $this->hasMany(Product::class);
    }
}
