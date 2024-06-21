<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPeminjaman extends Model
{
    use HasFactory;

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}