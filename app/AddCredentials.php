<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddCredentials extends Model
{
    protected $fillable = [
        'domain_name', 'url', 'name', 'email', 'password',
    ];
}

