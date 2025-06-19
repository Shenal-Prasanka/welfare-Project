<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Supply extends Model
{
   use HasFactory;
    
    protected $table = 'supplys';
    protected $primaryKey = 'id';
    protected $fillable = [
        'supply',
        'description',
        'active',
        'delete',
    ];

     public function product()
{
    return $this->hasMany(Product::class, 'supply_id');
}

}
