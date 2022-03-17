<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hero_Power extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['hero_id','power_id'];
}
