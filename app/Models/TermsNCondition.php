<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsNCondition extends Model
{
    use HasFactory;

    protected $table = 'terms_n_condtions';
    protected $fillable = ['title', 'description'];
}
