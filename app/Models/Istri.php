<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Istri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'nama',
        'nik',
        'pekerjaan',
        'gaji',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }
}
