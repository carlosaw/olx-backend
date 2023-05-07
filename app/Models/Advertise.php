<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'isNegotiable',
        'description',
        'user_id',
        'category_id',
        'state_id'
    ];

    // Um anúncio pertence a uma categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Um anúncio pertence a um estado
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    // Um anúncio sempre vai pertencer a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
