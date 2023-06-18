<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productinfo;
use App\Models\Suppliarinfo;
use App\Models\ProductCategory;
use App\Models\Subcategory;

class Workorder extends Model
{
    use HasFactory;


    public function categoryname()
    {

        return $this->HasOne(ProductCategory::class, 'id', 'categoryid');

    }
    public function suppliar()
    {
        return $this->HasOne(Suppliarinfo::class, 'suppliarid', 'suppliarid');
    }
    public function subcategory()
    {
        return $this->HasOne(Subcategory::class, 'id', 'subcactegoryid');
    }
    public function productname()
    {
        return $this->HasOne(Productinfo::class, 'productid', 'productid');
    }
}
