<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VersionModel extends Model
{
    //
    protected $table = 'version_table';

    protected $fillable = [
        'name', 'link', 'size',
    ];
}
