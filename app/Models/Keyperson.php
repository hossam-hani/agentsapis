<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyperson extends Model 
{

    protected $table = 'key_persons';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'notes',
        'reate',
        'negotiations',
        'connections',
        'image'
    ];      

    public function players()
    {
        return $this->hasMany('Player');
    }

}