<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Heroes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description'];


    public function Power()
    {
        return $this->belongsToMany(Power::class, 'hero_powers', 'hero_id', 'power_id');
    }

    public function Movies()
    {
        return $this->belongsToMany(Power::class, 'hero_movies', 'hero_id', 'movie_id');
    }
}
