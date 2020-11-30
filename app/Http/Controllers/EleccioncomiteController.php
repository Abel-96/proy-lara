<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use APP\Models\Rol;
use APP\Models\Eleccion;
use APP\Models\Eleccioncomite;
use Illuminate\Support\Facades\DB;




class EleccioncomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           /*
         $sql = "SELECT ec.id, e.periodo as eleccion, f.nombrecompleto as funcionario,
         r.descripcion as rol
         FROM eleccioncomite ec  INNER JOIN eleccion e ON ec.eleccion_id=e.id
         INNER JOIN funcionario f ON ec.funcionario_id = f.id
         INNER JOIN rol r ON ec.rol_id= r.id";
        $eleccioncomites = DB::select($sql);
        */
       
        /*  $eleccioncomites = Eleccioncomite::all();*/
        
     $eleccioncomites = DB::table('eleccioncomite')
         ->join('eleccion', 'eleccioncomite.eleccion_id', '=', 'eleccion.id')
         ->join('funcionario', 'eleccioncomite.funcionario_id', '=', 'funcionario.id')
         ->join('rol', 'eleccioncomite.rol_id', '=', 'rol.id')
         ->select('eleccioncomite.id', 'eleccion.periodo as eleccion',
         'funcionario.nombrecompleto as funcionario', 'rol.descripcion as rol')
         ->get(); 
       
        return view("eleccioncomite/list", 
        compact("eleccioncomites"));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Rol::all();
      $elecciones = Eleccion::all();
      $funcionarios = Funcionario::all();
      return view("eleccioncomite/create", 
      compact("roles","elecciones", "funcionarios"));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate([
         'rol_id' => 'required |integer',
         'funcionario_id' => 'required |integer',
         'eleccion_id' => 'required |integer'
     ]);
     $data = [
         "rol_id" => $request->rol_id,
         "funcionario_id" => $request->funcionario_id,
         "eleccion_id" => $request->eleccion_id

     ];

     Eleccioncomite::create($data);
     return redirect('eleccioncomite')->with('succes',
     'guardado satisfactoriamente ....');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Rol::all();
        $elecciones = Eleccion::all();
        $funcionarios = Funcionario::all();
        $eleccioncomite = Eleccioncomite::find($id);

        return view("eleccioncomite/edit", 
        compact("eleccioncomite"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
            'eleccion_id' => 'required|max:100',
            'funcionario_id' => 'required|max:200',
            'rol_id' => 'required|max:200',
            ]);
            
            Eleccioncomite::whereId($id)->update($validacion);
            return redirect('eleccioncomite')
            ->with('success', 'Actualizado correctamente...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eleccioncomite = Eleccioncomite::find($id);
        $eleccioncomite->delete();
        return redirect('eleccioncomite');
    }
}
