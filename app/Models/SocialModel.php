<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialModel extends Model
{
    //
    protected $fillable = [
        'provider_user_id', 'provider', 'user', 'provider_pass'
    ];
    protected $primaryKey = 'user_id';
    protected $table = 'social_models';
    public function login(){
        return $this->belongsTo('App\User','user');
    }
}
