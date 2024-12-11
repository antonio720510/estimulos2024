<?php

namespace App\Http\Controllers;

use App\Models\Estimulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstimuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    }

    public function muestraRecepcion1()
    {                
        $sql = "Select * from horariosEstimulo2024 where estatus=0 order by nombre asc";
        $emps = DB::select(DB::raw($sql)); 

        $hoy = date_format(now(),'Y-m-d'); // fecha del dia en curso        

        // Querys para reportes estadísticos
        $qry = "Select count(*) as total from horariosEstimulo2024 where estatus = 1 AND (DATE(fechaRegistro) BETWEEN '$hoy' AND  '$hoy')";
        $est1 = DB::select($qry);

        return view('recepcion1', compact('emps', 'est1'));
    }

    public function recepcion1(Request $request)
    {
        $sql = "Update horariosEstimulo2024 set estatus=1, fechaRegistro='".now()."' where numEmpleado=".$request->empleado;
        $registro = DB::update(DB::raw($sql)); 
        return redirect('muestraRecepcion1')->with('success', '¡Registro Exitoso!');

        // $registro = Estimulo::where('numEmpleado', '=', $request->empleado)->first();
        // if ($registro) {
        //     $registro->estatus = 1;
        //     $registro->fechaRegistro = now();
        //     $registro->update();
        //     return redirect('muestraRecepcion1')->with('success', '¡Registro Exitoso!');
        // }
    }

    public function reporte()
    {
        return view('reporte.estimulos');
    }

    public function reporteEstimulosPeriodo(Request $request){
        
        $qry = "SELECT  
            numEmpleado, 
            nombre,                          
            DATE_FORMAT(fechaRegistro,'%d/%m/%Y %H:%i:%s') fecha,             
            mesa
            FROM horariosEstimulo2024 tt 
            WHERE DATE(fechaRegistro) BETWEEN '$request->fecha1' AND  '$request->fecha2'       
            ORDER BY fecha ASC";
       
        $fecha1 = $newDate = date("d/m/Y", strtotime($request->fecha1));
        $fecha2 = $newDate = date("d/m/Y", strtotime($request->fecha2));

        $datos = DB::select(DB::raw($qry));
        
        $qry = "Select count(*) as total from horariosEstimulo2024 where estatus = 1 AND (DATE(fechaRegistro) BETWEEN '$request->fecha1' AND  '$request->fecha2')";
        $est1 = DB::select($qry);

        return view('reporte.repestimulos', compact('datos', 'fecha1','fecha2', 'est1'));
    }
}
