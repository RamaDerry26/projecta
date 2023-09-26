<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'projects';
    // protected $fillable = [
    //     'project_name',
    //     'project_date',
    //     'photo',
    // ];

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

}
