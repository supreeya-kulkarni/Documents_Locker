<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected $fillable = [
        'title', 'description', 'file',
    ];
}
