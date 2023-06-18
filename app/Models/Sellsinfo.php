<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productinfo;


class Sellsinfo extends Model
{
    use HasFactory;


    protected $fillable = [
        'showroomid',
        'productid',
        'vat',
        'stock',
        'price',
        'barcode', // Add this line to include the barcode property
    ];

    public function product()
    {

        return $this->belongsTo(Productinfo::class, 'productid', 'productid');

    }

}
