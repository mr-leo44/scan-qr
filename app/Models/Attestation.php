<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'file',
        'image'
    ];

    public function getRouteKeyName()
    {
        return 'student_name';
    }
}
