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

    public function IUP()
    {
        return $this->hasMany(InformasiUmumPeminjaman::class, 'surat_id');
    }

    public function TOS()
    {
        return $this->hasMany(TypeOfService::class, 'surat_id');
    }

    public function DOS()
    {
        return $this->hasMany(DescriptionOfService::class, 'surat_id');
    }

    public function status_peminjaman()
    {
        return $this->hasMany(StatusPeminjaman::class, 'surat_id');
    }

    public function aksi_peminjaman()
    {
        return $this->hasMany(AksiPeminjaman::class, 'surat_id');
    }
}
