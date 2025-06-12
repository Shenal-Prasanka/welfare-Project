<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welfare extends Model
{
    use HasFactory;
    
    protected $table = 'welfares';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'active',
        'delete',
    ];
}
