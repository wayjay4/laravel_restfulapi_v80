<?php

namespace App;

use App\Buyer;
use App\Product;
use App\Transformers\TransactionTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use SoftDeletes, HasFactory;

    protected $dates = ['deleted_at'];

    public $transformer = TransactionTransformer::class;
    
    protected $fillable = [
    	'quantity',
    	'buyer_id',
    	'product_id',
    ];

    public function buyer(){
    	return $this->belongsTo(Buyer::class);
    }

    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
