<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defuncion;
use App\Models\Estado;

class DefuncionController extends Controller
{
    public function getCasosDefunciones(){
        $defunciones = Defuncion::all();
        $totalCasos = $defunciones->sum('casos');
        echo "Casos defunciones: ".$totalCasos;
    }

    public function getCasosDefuncionesEstado($idEstado) {
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->defunciones->sum('casos');
        echo "Defunciones de: ".$estado->nombre.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->defunciones->sum('casos');
            $totalCasos += $casosE;
            echo "<B>".$estado->nombre."</B> :".$casosE."<br>";
        }
        echo "</br><B>DEFUNCIONES TOTALES: </B> ".$totalCasos;
    }

    public function index() {
        echo "<B>DEFUNCIONES POR ESTADO</B><br><br>";
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosDefuncionesEstado($idEstado);
    }

    public function getDefunciones(){
        return response()->json(Defuncion::get());
    }
}