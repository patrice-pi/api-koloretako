<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_address', 'machine'
    ];

    public $timestamps = false;
}
