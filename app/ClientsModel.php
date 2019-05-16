<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsModel extends Model
{
    //
    protected $table = 'clients_table';

    protected $fillable = [
        'name', 'company', 'address', 'rf_point','phone', 'email', 'cpf',
    ];

}
