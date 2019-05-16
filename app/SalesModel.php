<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    //
    protected $table = 'sales_table';

    protected $fillable = [
        'id_cli', 'id_prod', 'development_value', 'type_payment', 'payment_amount', 'url', 'start_date',
    ];
}
