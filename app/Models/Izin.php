<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izin';

    protected $fillable = [
        'user_id', 'tanggal', 'jenis', 'alasan', 'lampiran', 'status'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
