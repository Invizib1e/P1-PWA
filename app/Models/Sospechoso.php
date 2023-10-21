<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sospechoso extends Model
{
    protected $table = 'sospechosos_20230922185321';
    protected $primaryKey = 'estado_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['fecha', 'casos'];

    public function estado() {
        return $this->belongsTo(Estado::class);
    }
}