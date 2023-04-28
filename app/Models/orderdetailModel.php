<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetailModel extends Model
{
    use HasFactory;
    protected $table = 'OrderProductDetail';
    protected $fillable = [
        'OrdID',
        'ProID',
        'Quantity',
        'Price'
    ];
}
