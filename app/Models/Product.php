<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Category;
use App\Models\Supply;


class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'product',
        'category_id',
        'supply_id',
        'active',
        'delete',
    ];

    public function items()
    {
    return $this->hasMany(Item::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }

}
