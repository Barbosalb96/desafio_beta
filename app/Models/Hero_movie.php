<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hero_movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['hero_id', 'movie_id'];

}
