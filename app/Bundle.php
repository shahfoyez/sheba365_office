<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Product;
use App\BundleProduct;




class Bundle extends Model
{
    // use HasFactory;
    protected $guarded = [];
    protected $with=['product', 'bundleProducts'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function bundleProducts()
    {
        return $this->belongsTo(BundleProduct::class, 'bundle_id');
    }
}
