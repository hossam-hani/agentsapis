<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Familymember;
use App\Models\Team;
use App\Models\Agent;
use App\Models\Keyperson;

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
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function family()
    {
        return $this->hasMany(Familymember::class, 'player_id');
    }

    public function keyPerson()
    {
        return $this->belongsTo(Keyperson::class, 'key_person_id');
    }

    public function agent()
    {
        return $this->hasMany(Agent::class);
    }

}