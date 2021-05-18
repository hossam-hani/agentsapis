<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model 
{

    protected $table = 'links';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'code',
        'post_id',
    ];  

    public function post()
    {
        return $this->hasOne('Post', 'post_id');
    }

}