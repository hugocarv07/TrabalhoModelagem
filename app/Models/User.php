<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_contributor',
        'is_approved',
        'country',
        'rating',
        'completed_orders',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
        'is_contributor' => 'boolean',
        'is_approved' => 'boolean',
    ];

    // ✅ Métodos auxiliares para verificar status do usuário
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function isContributor(): bool
    {
        return $this->is_contributor;
    }

    public function isApproved(): bool
    {
        return $this->is_approved;
    }

    // 🔹 Relacionamentos

    // Um usuário pode ter várias solicitações de produtos
    public function productRequests()
    {
        return $this->hasMany(ProductRequest::class, 'user_id');
    }

    // Um contribuidor pode enviar várias propostas de pedido
    public function orderProposals()
    {
        return $this->hasMany(OrderProposal::class, 'contributor_id');
    }

    // 🔹 Pedidos aceitos e em progresso
    public function completedOrders()
    {
        return $this->hasMany(ProductRequest::class, 'user_id')
            ->where('status', 'in_progress')
            ->whereHas('orderProposals', function ($query) {
                $query->where('status', 'accepted');
            });
    }

    // Pedidos que ainda não foram aceitos
    public function pendingOrders()
    {
        return $this->hasMany(ProductRequest::class, 'user_id')
            ->where('status', 'in_progress');
    }

    // 🔹 Avaliações

    // Avaliações que este usuário fez para outras pessoas
    public function givenReviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    // Avaliações que este usuário recebeu
    public function receivedReviews()
    {
        return $this->hasMany(Review::class, 'contributor_id');
    }
}
