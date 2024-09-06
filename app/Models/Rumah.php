<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rumah extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'rumah_code',
        'tipe_rumah',
        'harga',
        'detail',
        'status',
        'village_id',
    ];

    public function penilaian() {
        return $this->hasMany(Penilaian::class);
    }

    public function village() {
        return $this->belongsTo(Village::class);
    }
}
