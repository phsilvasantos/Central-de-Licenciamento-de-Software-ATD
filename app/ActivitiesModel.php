<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivitiesModel extends Model
{
    //

    protected $table = 'activities_table';

    protected $fillable = [
        'name', 'id_dev',
    ];
}
