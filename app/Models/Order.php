<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'payment_method',
        'total',
    ];

    /**
     * Relationship with OrderItem model.
     * One order can have multiple order items.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relationship with User model.
     * One order belongs to one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
