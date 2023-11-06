<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;

class Card extends Model
{
    use HasFactory, Filterable;

    protected $fillable = ['name', 'data', 'image', 'status', 'user_id'];
    protected $casts = [
        'data' => 'array',
    ];

    private static $whiteListFilter = ["*"];
}
