<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OpinionControlador extends Controller
{
    public function ver()
    {
        // $opiniones = DB::select('select * from opiniones');
        $opiniones = Opinion::all();

        // $opiniones = Opinion::where('valoracion', '5')->get();


        return view('verOpiniones', ['opiniones' => $opiniones]);
    }
    
    public function vistaInsertarOpinion(Request $request){
        return view('insertarOpinion');
    }
    public function insertarOpinion(Request $request)
    {
        // Validación de los campos (opcional)
        // $request->validate([
        //     'valoracion' => 'required|string|max:255',
        //     'descripcion' => 'required|string|max:255',
        // ]);


        //Crear un objeto de tipo opinion
        $opinion = new Opinion();

        //Variable local ->CampoEnLaBBDD = Variable ->input("nombre del name del formulario")
        $opinion->valoracion = $request->input('valoracion');
        $opinion->descripcion = $request->input('descripcion');

        //Insertar en la tabla de la bbdd
        $opinion->save();
        // DB::insert('insert into opiniones values (?, ?)', [$opinion->valoracion, $opinion->descripcion]);


        return redirect('verOpiniones');
    }

    public function eliminarOpinion(Request $request){
        $idEliminar = $request->id;

        Opinion::where('id', $idEliminar)->delete();

        return redirect('verOpiniones');
    }


    public function vistaModificar(Request $request)
    {
        // $opiniones = DB::select('select * from opiniones');
        // $opiniones = Opinion::all();

        // $opiniones = Opinion::where('valoracion', '5')->get();
        $idModificar = $request->id;

        return view('modificarOpinion', ['idOpinion' => $idModificar]);
    }
    public function modificarOpinion(Request $request){

        // $idModificar = 4;

        // Opinion::where('id', $idModificar)->update(['valoracion' => 2, 'descripcion' => "opinion modificada"]);

        $opinion = new Opinion();

        $opinion->id = $request->input('id');
        $opinion->valoracion = $request->input('valoracion');
        $opinion->descripcion = $request->input('descripcion');

        Opinion::where('id', $opinion->id)->update(['valoracion' => $opinion->valoracion, 'descripcion' => $opinion->descripcion]);

        return redirect('verOpiniones');

    }
}

