<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttachmentsModel extends Model
{
    //
    protected $table = 'attachments_table';

    protected $fillable = [
        'name', 'link', 'size',
    ];
}
