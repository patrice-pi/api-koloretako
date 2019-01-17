<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'score', 'duration', 'mode',
    ];

    public $timestamps = false;
}
