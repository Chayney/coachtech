<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'condition_id',
        'name',
        'description',
        'price',
        'image'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function elements()
    {
        return $this->belongsToMany(Element::class, 'categories');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where(function ($query) use ($keyword) {
              $query->where("name", "like", "%" . $keyword . "%");
            });
        }
    }

    public function favoriteMarked()
    {
        $id = Auth::id();
        $favoriteMarkers = array();
        foreach ($this->favorites as $favoriteMark) {
            array_push($favoriteMarkers, $favoriteMark->profile_id);
        }
        
        if (in_array($id, $favoriteMarkers)) {
            return true;
        } else {
            return false;
        }
    }
}
