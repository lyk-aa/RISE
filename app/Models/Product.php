<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'rice_type',
        'unit',
        'unit_price',
        'selling price',
        'target_level',
        'reorder_level',
    ];
    
}
