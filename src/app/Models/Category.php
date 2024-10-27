<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'element_id'
    ];

    public function categoryItem()
    {
        return $this->belongsTo(Item::class);
    }

    public function element()
    {
        return $this->belongsTo(Element::class);
    }
}
