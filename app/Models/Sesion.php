<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $fillable = ["slot_id","terapeuta_id","paquete_id","paciente_id","horario","duracion","modalidad", "estatus","razon_cancelacion","notas","precio"];

    public function slot(){
        return $this->belongsTo(SlotsViables::class, 'slot_id');
    }

    public function terapeuta(){
        return $this->belongsTo(User::class,"terapeuta_id");
    }

    public function paciente(){
        return $this->belongsTo(User::class,"paciente_id");
    }

    public function paquete(){
        return $this->belongsTo(Paquete::class,"paquete_id");
    }

    public function pagos(){
        return $this->hasMany(Pago::class,"sesion_id");
    }
}
