<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'phone', 'email', 'fb', 'ytb', 'twitter', 'insta', 'linkedin'];
}
