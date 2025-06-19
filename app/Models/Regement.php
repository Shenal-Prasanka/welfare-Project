<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Regement extends Model
{
     use HasFactory;


    protected $fillable = [
        'regement',
        'active',
        'delete',
    ];

    public function units()
{
    return $this->hasMany(Unit::class, 'regement_id');
}

}
