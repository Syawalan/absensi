<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'nama_admin',
        'email',
        'password'
    ];

    protected $hidden = ['password'];

    public function  users() {
        return $this->hasMany(User::class);
    }

    public function setting() {
        return $this->hasOne(Setting::class);
    }

    public function absensi() {
        return $this->hasMany(Absensi::class);
    }
}
