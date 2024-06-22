<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescriptionOfService extends Model
{
    use HasFactory;
    protected $table = 'deskripsi_of_services';
    protected $guarded = ['id'];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }
}
