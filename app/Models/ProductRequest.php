<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class ProductRequest extends Model
{
    use HasFactory;

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

    // ✅ Conversão automática para horário de Brasília (BRT - UTC-3)
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('America/Sao_Paulo');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('America/Sao_Paulo');
    }
    public function orderProposals()
{
    return $this->hasMany(OrderProposal::class);
}

}
