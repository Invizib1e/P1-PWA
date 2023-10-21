<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sospechoso;
use App\Models\Estado;

class SospechosoController extends Controller
{
    public function getCasosSospechosos(){
        $sospechosos = Sospechoso::all();
        $totalCasos = $sospechosos->sum('casos');
        echo "Casos sospechosos: ".$totalCasos;
    }

    public function getCasosSospechososEstado($idEstado) {
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->sospechosos->sum('casos');
        echo "Casos sospechosos de ".$estado->nombre.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->sospechosos->sum('casos');
            $totalCasos += $casosE;
            echo "<B>".$estado->nombre."</B>: "."".$casosE."<br>";
        }
        echo "</br><B>SOSPECHOSOS TOTALES:</B> ".$totalCasos;
    }

    public function index() {
        echo "<B>SOSPECHOSOS POR ESTADO </B><br><br>";
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosSospechososEstado($idEstado);
    }

    public function getSospechosos(){
        return response()->json(Negativo::get());
    }
}