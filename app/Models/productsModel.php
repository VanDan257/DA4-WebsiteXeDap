<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsModel extends Model
{
    use HasFactory;
    protected $table = 'product';
    public function category()
    {
        return $this->belongsTo('App\Models\categoryModel', 'CateID', 'id');
    }
    public function image()
    {
        return $this->hasMany('App\Models\imageproductModel');
    }
    protected $fillable = [
        'CateID',
        'Description',
        'Image',
        'Price',
        'PromotionPrice',
        'Title',
        'Amount',
        'id'
    ];

}