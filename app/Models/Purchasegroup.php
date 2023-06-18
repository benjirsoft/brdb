<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasegroup extends Model
{
    use HasFactory;
    protected $table = 'purchasegroups';
    protected  $fillable = [
        'orderid', 'purchaseid','suppliarid',	'productid','purchasedate',	'qty',	'vat','totalsellsprice','unitcost','customerprice','barcode'
    ];
}
