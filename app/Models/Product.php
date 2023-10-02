<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'secondary_category_id',
        'image1',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function secondary()
    {
        return $this->belongsTo(SecondaryCategory::class);
    }
}
