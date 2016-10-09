<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'user_id',
        'resource_id',
        'descricao',
        'arquivo'
    ];
    
    // Obter o usuário que solicitou o orçamento (Budget -> User)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    // Obter o recurso solicitado (Budget -> Resource)
    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }
}
