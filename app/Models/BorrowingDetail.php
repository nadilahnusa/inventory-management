<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrowing_id',
        'product_id',
        'quantity',
    ];

    /**
     * Parent borrowing.
     */
    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }

    /**
     * Borrowed product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}