<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model {
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'rumah_id',
        'nilai',
        'status',
    ];

    public function nasabah() {
        return $this->belongsTo(Nasabah::class);
    }

    public function rumah() {
        return $this->belongsTo(Rumah::class);
    }
}
