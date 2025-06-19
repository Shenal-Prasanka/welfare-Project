<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regement;

class Unit extends Model
{
     use HasFactory;

    
    protected $fillable = [
        'regement_id',
        'unit',
        'active',
        'delete',
    ];
    public function regement()
    {
        return $this->belongsTo(Regement::class, 'regement_id');
    }

}
