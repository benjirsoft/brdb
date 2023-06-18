<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producttype;

class Productinfo extends Model
{
    use HasFactory;

    protected $fillable =[''];

    public function productype()
    {
        return $this->HasOne(Producttype::class, 'id', 'producttypes');
    }
}
