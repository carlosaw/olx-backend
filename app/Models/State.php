<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    // Um estado pode ter vários anúncios
    public function advertises()
    {
        return $this->hasMany(Advertise::class);
    }

    // Um estado pode ter vários usuários
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
