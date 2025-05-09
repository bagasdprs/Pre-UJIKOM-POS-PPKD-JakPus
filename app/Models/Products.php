<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'price',
        'stock',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
