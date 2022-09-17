<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_posts extends Model
{
    use HasFactory;

    protected $table = 'user_posts';

    protected $fillable = ['user_id', 'post_id'];
}
