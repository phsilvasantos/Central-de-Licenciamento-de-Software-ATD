<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevelopmentModel extends Model
{
    //
    protected $table = 'development_table';

    protected $fillable = [
        'name', 'description', 'info', 'id_manager',
    ];
}
