<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class priceproductModel extends Model
{
    use HasFactory;
    protected $table = 'pricehistory';
    protected $fillable = [
        'ProID',
        'StartDate',
        'EndDate',
        'Price'
    ];
}
