<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Item extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'product_id',
        'item',
        'serial_number',
        'active',
        'delete',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
