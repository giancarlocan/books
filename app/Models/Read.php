<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Read extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'isbn',
        'book_id',
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function requestor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
