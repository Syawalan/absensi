<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table='izin';

    protected $fillable = [
        'user_id', 'tanggal', 'jenis', 'alasan', 'lampiran', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
