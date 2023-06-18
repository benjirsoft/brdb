<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productinfo;

class Cartproduct extends Model
{
    use HasFactory;


    public function productinfo()
    {


        return $this->HasOne(Productinfo::class, 'productid', 'productid');

    }



}
