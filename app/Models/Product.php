<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
        'serial_number',
        'name',
        'description',
        'total_stock',
        'available_stock',
        'location',
        'condition',
        'status',
        'image',
    ];

    /**
     * Product belongs to category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Product has many borrowing details.
     */
    public function borrowingDetails()
    {
        return $this->hasMany(BorrowingDetail::class);
    }
}