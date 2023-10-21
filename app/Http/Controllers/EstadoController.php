<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    public function show(string $id)
    {
        /*foreach (Estado::all() as $estado){
            echo $estado->name;
        }*/
        echo "<B>".Estado::find($id)->nombre."</B><br>";
    }

    public function index()
    {
        //foreach (Estado::get() as $estado){
          //  echo "B".$estado->nombre."</B><br>";
            return view('casos.index');
        }

    public function getEstados(){
        return response()->json(Estado::get());
     }
    
}


