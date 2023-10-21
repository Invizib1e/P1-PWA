<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negativo;
use App\Models\Estado;

class NegativoController extends Controller
{
    
    public function getCasosNegativos(){
        $negativos = Negativo::all();
        $totalCasos = $negativos->sum('casos');
        echo "Casos negativos:".$totalCasos;
    }

    public function getCasosNegativosEstado($idEstado) {
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->negativos->sum('casos');
        echo "Casos negativos de ".$estado->nombre.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->negativos->sum('casos');
            $totalCasos += $casosE;
            echo "<B>".$estado->nombre."</B>: "."".$casosE."<br>";
        }
        echo "</br><B>NEGATIVOS TOTALES:</B> ".$totalCasos;
    }

    public function index() {
        echo "<B>NEGATIVOS POR ESTADO</B><br><br>";
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosNegativosEstado($idEstado);
    }

    public function getNegativos(){
        return response()->json(Negativo::get());
    }

}