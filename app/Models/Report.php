<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'read_id',
        'book_id',
        'rating',
        'description',
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
