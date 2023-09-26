<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_type extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'contact_types';
    // protected $fillable = [];

    public function contact() {
        return $this->hasMany(contact::class);
    }
}
