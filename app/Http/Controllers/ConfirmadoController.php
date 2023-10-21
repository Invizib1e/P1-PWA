<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmado;
use App\Models\Estado;

class ConfirmadoController extends Controller
{
    public function getCasosConfirmados(){
        $confirmados = Confirmado::all();
        $totalCasos = $confirmados->sum('casos');
        echo "Casos confirmados:".$totalCasos;
    }

    public function getCasosConfirmadosEstado($idEstado){
       /* $estado = Estado::find($idEstado);
        $casosEstados = Confirmado::where('estado_id','=',$idEstado);
        $totalCasos = $casosEstados->sum('casos');
        echo "Casos confirmados de ".$estado->nombre.": ".$totalCasos;*/

        $estado = Estado::find($idEstado);
        $totalCasos = $estado->confirmados->sum('casos');
        echo "Casos confirmados de ".$estado->nombre.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->confirmados->sum('casos');
            $totalCasos += $casosE;
            echo "<B>".$estado->nombre."</B> :".$casosE."<br>";
        }
        echo "</br><B>CONFIRMADOS TOTALES</B> ".$totalCasos;
    }

    //public function index(){
    //    self::getCasosConfirmados();
    //}

    public function show($idEstado){
        self::getCasosConfirmadosEstado($idEstado);
    }

    public function index() {
        echo "<B>CASOS POR ESTADO</B><br><br>";
        self::getCasosDesglosados();
    }
    
    public function getConfirmados(){
        return response()->json(Confirmado::get());
    }
}
