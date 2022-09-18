<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pendaftar(){
        return $this->hasMany(Pendaftar::class);
    }
}
