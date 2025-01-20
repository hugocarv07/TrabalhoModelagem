<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'estimated_price',
        'category',
        'origin_country',
        'status',
        'deadline',
        'quantity'
    ];

    protected $casts = [
        'deadline' => 'date',
        'estimated_price' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}