<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiUmumPeminjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }
}
