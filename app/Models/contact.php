<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'contacts';
    // protected $fillable = [
    //     'name',
    // ];

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

    public function contact_type() {
        return $this->belongsTo(contact_type::class);
    }
}
