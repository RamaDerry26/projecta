<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'siswa';
    protected $fillable = [
        'name',
        'about',
        'photo',
    ];

    public function project() {
        return $this->hasMany(projects::class);
    }

    public function contact() {
        return $this->hasMany(contact::class);
    }
}
