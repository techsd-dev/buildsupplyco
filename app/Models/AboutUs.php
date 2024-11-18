<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
            'bnr_title',
            'bnr_content',
            'main_content',
            'banner',
            'image'
        ];
}
