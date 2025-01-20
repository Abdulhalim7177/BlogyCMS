<?php

namespace App\Models\post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable =[
        'id',
        'name',
        'created_at'
    ];
}
