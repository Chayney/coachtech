<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'item_id',
        'comment'
    ];

    public function commentProfile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function commentItem()
    {
        return $this->belongsTo(Item::class);
    }
}
