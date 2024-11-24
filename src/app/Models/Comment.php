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

    public function scopeFreewordSearch($query, $freeword)
    {
        if (!empty($freeword)) {
            $query->where('comment', 'like', '%' . $freeword . '%')
                  ->orWhereHas('commentProfile', function ($query) use ($freeword) {
                      $query->where('profiles.name', 'like', '%' . $freeword . '%');
            });
        }
    }
}
