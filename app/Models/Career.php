<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = ['designation', 'slug', 'job_location', 'qualification',	'experience',	'overview',	'roles_n_responsibilities', 'image'];
}
