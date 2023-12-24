<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentToChild extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id_parent',
        'user_id_child',
    ];
}
