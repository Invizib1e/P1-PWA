<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negativo extends Model
{
    protected $table = 'negativos_20230922185305';
    protected $primaryKey = 'estado_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['fecha', 'casos'];

    public function estado() {
        return $this->belongsTo(Estado::class);
    }
}