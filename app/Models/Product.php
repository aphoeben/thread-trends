<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Add this line

class Product extends Model
{
    use HasFactory;
    public function wishedBy()
{
    return $this->belongsToMany(User::class, 'wishlists');
}

}