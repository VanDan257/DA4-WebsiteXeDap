<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    use HasFactory;
    protected $table = 'OrderProduct';
    protected $fillable = [
        'CusID',
        'OrderDate',
        'Phone',
        'Recipient',
        'DeliveryAddress',
        'TotalPay',
        'Status',
        // 'MethodePay',
        'Note'
    ];
}
