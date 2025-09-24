<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    
    protected $table = 'absensi';

    protected $fillable = [
        'user_id', 'tanggal', 'jam_masuk', 'jam_pulang',
        'foto_masuk', 'foto_pulang',
        'lat_masuk', 'lng_masuk', 'lat_pulang', 'lng_pulang',
        'status', 'keterangan'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
