<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    protected $fillable = [
        'user_id',
        'judul_laporan',
        'deskripsi_masalah',
        'lokasi_ruangan',
        'foto_bukti',
        'status',
        'catatan_teknisi',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_selesai' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
