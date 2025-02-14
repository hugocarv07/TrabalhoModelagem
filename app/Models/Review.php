<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contributor_id',
        'rating',
        'comment'
    ];

    // Relacionamento: Quem fez a avaliação
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento: Quem foi avaliado
    public function contributor()
    {
        return $this->belongsTo(User::class, 'contributor_id');
    }

    // Garante que a nota seja entre 1 e 5 antes de salvar
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($review) {
            if ($review->rating < 1 || $review->rating > 5) {
                throw new \InvalidArgumentException('A nota deve estar entre 1 e 5.');
            }
        });
    }
}
