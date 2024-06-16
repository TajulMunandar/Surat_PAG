<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function informasi_umum()
    {
        return $this->hasMany(InformasiUmum::class, 'id');
    }

    public function alat_pelindung()
    {
        return $this->hasMany(AlatPelindung::class, 'id');
    }

    public function uraian()
    {
        return $this->hasMany(Uraian::class, 'id');
    }
}
