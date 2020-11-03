<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //Primary key
    public $primarykey = 'id';
    //Timestamps
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'tel',
        'gender',
        'contents',
    ];

}
