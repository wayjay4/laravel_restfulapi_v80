<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\BuyerScope;

class Buyer extends User
{
	protected static function boot(){
		parent::boot();

		static::addGlobalScope(new BuyerScope);
	}

    // model relation between User and Transactions
    public function transactions(){
    	return $this->hasMany(Transaction::class);
    }
}
