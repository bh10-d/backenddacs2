<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public $timestamps = false;
    protected $table = 'comment';
    protected $primaryKey ='comment_id';
    protected $fillable = [
        'comment',
        'comment_name',
        'comment_date',
        'id_product',
        'id_user'
    ];
}
