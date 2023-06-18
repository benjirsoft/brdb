<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productinfo;

class Stock extends Model
{
    use HasFactory;





    public function product()
    {

        return $this->HasOne(Productinfo::class, 'productid', 'productid');

    }
}
