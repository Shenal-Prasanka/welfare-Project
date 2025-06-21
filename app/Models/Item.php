<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Welfare;

class Item extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'product_id',
        'welfare_id',
        'item',
        'serial_number',
        'price',
        'vat',
        'tax',
        'discount',
        'total_price',
        'active',
        'delete',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function welfare()
    {
        return $this->belongsTo(Welfare::class, 'welfare_id');
    }
}
