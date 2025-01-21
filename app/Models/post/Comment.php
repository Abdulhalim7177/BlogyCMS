<?php

namespace App\Models\post;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [

        'id',
        'user_id',
        'comment',
        'user_name',
        'post_id',
        'created_at',
        'updated_at',
    ];
}
