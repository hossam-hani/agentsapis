<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotifcationToken extends Model 
{

    protected $table = 'notifcation_tokens';
    public $timestamps = true;

    protected $fillable = [
        'token',
        'user_id'
    ];  

    public function user()
    {
        return $this->hasOne('User', 'user_id');
    }

}