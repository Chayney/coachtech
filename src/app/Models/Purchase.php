<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'item_id'
    ];

    public function purchaseProfile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function purchaseItem()
    {
        return $this->belongsTo(Item::class);
    }
}
