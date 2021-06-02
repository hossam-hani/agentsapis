<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Team extends Model 
{

    protected $table = 'teams';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'logo',
    ];
    use SoftDeletes;

    protected $dates = ['deleted_at'];

}