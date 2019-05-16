<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirementsModel extends Model
{
    //
    protected $table = 'requirements_table';

    protected $fillable = [
        'name', 'id_dev',
    ];
}
