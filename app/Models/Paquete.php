<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $fillable = ["notas","num_sesiones","precio_total","terapeuta_id","paciente_id"];

    protected $casts = [
        'precio_total' => 'decimal:2',
        'num_sesiones' => 'integer',
    ];

    public function sesions(){
        return $this->hasMany(Sesion::class,"paquete_id");
    }

    public function pagos(){
        return $this->hasMany(Pago::class,"paquete_id");
    }

    public function terapeuta(){
        return $this->belongsTo(User::class,"terapeuta_id");
    }

    public function paciente(){
        return $this->belongsTo(User::class,"paciente_id");
    }
}
