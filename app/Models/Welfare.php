<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Welfare extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'name',
        'active',
        'delete',
    ];

    public function items()
    {
    return $this->hasMany(Item::class, 'welfare_id');
    }
}
