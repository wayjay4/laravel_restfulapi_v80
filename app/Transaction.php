<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
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
