<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content',
        'type',
        'section',
        'user_id'
    ];  

    public function user()
    {
        return $this->hasOne('User', 'user_id');
    }

}