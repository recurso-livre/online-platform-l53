<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Resource extends Model
{
    use Searchable;

    // Campos que permitirão Mass Assignment
    protected $fillable = [
        "name",
        "technicalDescription",
        "informalDescription",
        "uriResources",
        "user_id"
    ];

    // Promover o relacionamento (Resource -> Category)
    public function categories()
    {
        // Resource possui várias categorias
        return $this->belongsToMany('App\Category', 'resources_categories');
    }

    // Promover o relacionamento (Resource -> User)
    public function user()
    {
        // Resource possui 1 usuário
        return $this->belongsTo('App\User');
    }
}
