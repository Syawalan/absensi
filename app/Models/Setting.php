<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    
    protected $fillable = [
        'nama_kantor', 'latitude', 'longitude', 'radius_meter'
    ];

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
