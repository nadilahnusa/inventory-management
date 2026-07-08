<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrowing_code',
        'user_id',
        'department_id',
        'borrower_name',
        'purpose',
        'borrow_date',
        'return_date',
        'actual_return_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'borrow_date' => 'date',
        'return_date' => 'date',
        'actual_return_date' => 'date',
    ];

    /**
     * Warehouse staff who records the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Borrower's department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Borrowed items.
     */
    public function details()
    {
        return $this->hasMany(BorrowingDetail::class);
    }
}