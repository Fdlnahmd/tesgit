<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'kategori',
        'name',
        'kelas',
        'aspirasi',
        'keterangan',
        'gambar_kejadian',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'deleted_at'
    ];
}