<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }

    public function golongan(){
        return $this->belongsTo(Golongan::class);
    }
    
    public function unitKerja(){
        return $this->belongsTo(UnitKerja::class);
    }
    
    public function bidangKeahlian(){
        return $this->belongsTo(BidangKeahlian::class);
    }

    public function pendaftarBa(){
        return $this->hasMany(PendaftarBa::class);
    }

    public function timPendaftar(){
        return $this->hasMany(TimPendaftar::class);
    }
}
