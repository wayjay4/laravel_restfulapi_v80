<?php

namespace App;

use App\Product;
use App\Transformers\CategoryTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
	use SoftDeletes, HasFactory;

	protected $dates = ['deleted_at'];

    public $transformer = CategoryTransformer::class;

    protected $fillable = [
    	'name',
    	'description',
    ];

    protected $hidden = [
        'pivot',
    ];

    public function products(){
    	return $this->belongsToMany(Product::class);
    }
}
