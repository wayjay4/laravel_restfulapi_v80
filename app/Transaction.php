<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
    	'quantity',
    	'buyer_id',
    	'product_id',
    ];

    public function buyer(){
    	return belongsTo(Buyer::class);
    }

    public function product(){
    	return belongsTo(Product::class);
    }
}
