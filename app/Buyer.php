<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends User
{
    // model relation between User and Transactions
    public function transactions(){
    	return $this->hasMany(Transaction::class);
    }
}
