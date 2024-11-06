<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'item_id'
    ];

    public function favoriteProfile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function favoriteItem()
    {
        return $this->belongsTo(Item::class);
    }
}