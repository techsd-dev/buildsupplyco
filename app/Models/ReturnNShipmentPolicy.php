<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnNShipmentPolicy extends Model
{
    use HasFactory;

    // protected $table = ['return_n_shipment_policies'];
    protected $fillable = ['title', 'description', 'title1', 'description1'];
}
