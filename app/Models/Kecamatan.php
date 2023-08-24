<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama'
    ];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
