<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productinfo;

class Cartinfo extends Model
{
    use HasFactory;




    public function productinfo()
    {

        return $this->belongsTo(Productinfo::class, 'productid', 'productid');

    }
}
