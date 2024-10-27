<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'category_id',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
}
