<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model 
{

    protected $table = 'players';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'image',
        'notes',
        'position',
        'birth_date',
        'nationality',
        'mbti_mini_link',
        'mbti_full_link',
        'dna_mini_link',
        'dna_full_link',
        'tag',
        'team_id',
        'key_person_id',
        'agent_id',
    ];  

    public function team()
    {
        return $this->hasOne('Teams', 'team_id');
    }

    public function family()
    {
        return $this->hasMany('\Familymembers', 'player_id');
    }

    public function keyPerson()
    {
        return $this->hasOne('Keyperson', 'key_person_id');
    }

    public function agent()
    {
        return $this->hasOne('Agents', 'agent_id');
    }

}