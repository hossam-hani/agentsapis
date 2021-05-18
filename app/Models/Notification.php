<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notification';
    public $timestamps = true;

    public function user()
    {
        return $this->hasOne('User', 'user_id');
    }

}