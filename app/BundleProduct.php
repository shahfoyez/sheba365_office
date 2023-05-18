<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BundleProduct extends Model
{
    protected $guarded = [];
    // protected $with=['product', 'bundleProducts'];
    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }
    // public function bundleProducts()
    // {
    //     return $this->belongsTo(BundleProduct::class, 'bundle_id');
    // }
}
