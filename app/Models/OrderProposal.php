<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_request_id',
        'contributor_id',
        'phone',
        'message',
        'status'
    ];

 // ✅ Relacionamento: A proposta pertence a um pedido específico
 public function productRequest()
 {
     return $this->belongsTo(ProductRequest::class, 'product_request_id');
 }

 // ✅ Relacionamento: A proposta pertence a um colaborador
 public function contributor()
 {
     return $this->belongsTo(User::class, 'contributor_id');
 }
}

