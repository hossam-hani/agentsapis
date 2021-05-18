<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familymember extends Model 
{

    protected $table = 'family_members';
    public $timestamps = true;

    protected $fillable = [
       'name',
       'title',
       'description',
       'player_id',
       'image',
    ];  

    public function player()
    {
        return $this->hasOne('Player', 'player_id');
    }

}