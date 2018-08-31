<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $fillable=[
        'reg','first_name','last_name','password'
    ];
}
