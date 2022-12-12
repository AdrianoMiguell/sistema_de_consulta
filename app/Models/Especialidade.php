<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
