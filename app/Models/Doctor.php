<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'especialidade_id',
        'image',
    ];

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }

    public function consult()
    {
        return $this->hasMany(Consult::class);
    }
}
