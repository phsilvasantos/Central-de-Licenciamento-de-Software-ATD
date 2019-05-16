<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    //
    protected $table = 'products_table';

    protected $fillable = [
        'name', 'description', 'implementation', 'value',
    ];
}
