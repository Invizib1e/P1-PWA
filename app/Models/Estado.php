<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Confirmado;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Defuncion;
use App\Models\Negativo;
use App\Models\Sospechoso;

class Estado extends Model
{
    use HasFactory;
    protected $table = 'estados_20230922185249';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['poblacion','nombre','codigos_estados'];

    public function confirmados(): HasMany
    {
        return $this->hasMany(Confirmado::class);
    }

    public function negativos(): HasMany {
        return $this->hasMany(Negativo::class);
    }

    public function sospechosos(): HasMany {
        return $this->hasMany(Sospechoso::class);
    }

    public function defunciones(): HasMany {
        return $this->hasMany(Defuncion::class);
    }
}
