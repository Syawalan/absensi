<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';

    protected $fillable = [
        'nama_admin',
        'email',
        'password'
    ];
    
    protected $hidden = ['password'];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function setting() {
        return $this->hasOne(Setting::class);
    }
    
    public function absensi() {
        return $this->hasMany(Absensi::class);
    }
}
