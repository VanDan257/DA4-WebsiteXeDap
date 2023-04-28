<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specificationproductModel extends Model
{
    use HasFactory;
    protected $table = 'specifications';
    protected $fillable = [
        'ProID',
        'SpeName',
        'Description'
    ];
}
