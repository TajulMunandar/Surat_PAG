<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function informasi_umum()
    {
        return $this->hasMany(InformasiUmum::class, 'surat_id');
    }

    public function alat_pelindung()
    {
        return $this->hasMany(AlatPelindung::class, 'surat_id');
    }

    public function uraian()
    {
        return $this->hasMany(Uraian::class, 'surat_id');
    }
}
