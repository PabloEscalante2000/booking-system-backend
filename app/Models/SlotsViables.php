<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlotsViables extends Model
{
    protected $fillable = ["terapeuta_id","fecha_inicio","fecha_final","estatus","source"];

    public function user(){
        return $this->belongsTo(User::class,"terapeuta_id");
    }
}
