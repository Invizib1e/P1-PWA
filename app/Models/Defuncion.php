<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Estado;

class Defuncion extends Model
{
    protected $table = 'defunciones_20230922185240';
    //protected $primaryKey = 'estado_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['estado_id', 'fecha', 'casos'];

    public function estado(): BelongsTo {
        return $this->belongsTo(Estado::class);
    }
}