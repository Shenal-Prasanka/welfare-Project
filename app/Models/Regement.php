<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regement extends Model
{
     use HasFactory;

    protected $table = 'regements';
    protected $primaryKey = 'id';
    protected $fillable = [
        'regement',
        'active',
        'delete',
    ];

    public function units()
{
    return $this->hasMany(Unit::class, 'unit', 'id');
}

}
