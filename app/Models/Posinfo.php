<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paymentinfo;

class Posinfo extends Model
{
    use HasFactory;


    protected $fillable = ['cartid', 'totalamount', 'totalvat', 'payment_ref', 'discount'];

    public function payment()
    {

        return $this->HasOne(Paymentinfo::class, 'id', 'paymentid');

    }

    public function suppliar()
    {


        return $this->HasOne(\app\Models\Suppliarinfo::class, 'suppliarid', 'suppliarid');

    }



}
