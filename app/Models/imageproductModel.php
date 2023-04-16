<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imageproductModel extends Model
{
    use HasFactory;
    protected $table = 'imageproduct';
    public function product(){
        return $this->hasMany('App\Models\productsModel');
    }
    protected $fillable = [
        'ProID',
        'ImagePath',
        'Caption',
        'IsDefault',
        'SortOrder'
    ];
}
