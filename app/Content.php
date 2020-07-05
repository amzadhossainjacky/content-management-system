<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    protected $fillable = [
        'contentTitle', 'contentDetails', 'contentLink','contentUrl','contentType','publishSection','status',
    ];

}
