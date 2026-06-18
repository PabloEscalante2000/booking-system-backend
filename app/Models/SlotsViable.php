<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlotsViable extends Model
{
    protected $fillable = ["terapeuta_id","fecha_inicio","fecha_final","estatus","source"];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_final'  => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class,"terapeuta_id");
    }

    public function sesions(){
        return $this->hasMany(Sesion::class,"slot_id");
    }
}
