<?php

namespace App\Http\Controllers;

use App\Models\Somatometria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SomatometriaController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('empleado.crear');
    }


    public function store(Request $request)
    {
        $registro = Somatometria::where('numEmpleado', '=', $request->empleado)->first();
        if (!$registro) {
            $soma = new Somatometria();
            $soma->numEmpleado = $request->empleado;
            $soma->idEmpleado = $request->idEmpleado;
            $soma->nombre = $request->nombre;
            $soma->paterno = $request->paterno;
            $soma->materno = $request->materno;
            $soma->fechaRegistro = now();
            $soma->estatus = 1; // Registro Asistencia
            $soma->save();
            return redirect('showRecepcion1')->with('success', '¡Registro Exitoso!');
        }
        return redirect('showRecepcion1')->with('error', '¡El Servidor público ya está registrado!');
    }

    public function guardaNuevoEmp(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'numEmpleado' => 'required|unique:EmpleadosSomatometria,numEmpleado',
            //'idEmpleado' => 'required|unique:EmpleadosSomatometria,idEmpleado',
        ]);

        $emp = new Somatometria();
        $emp->numEmpleado = $request->numEmpleado;
        $emp->idEmpleado = $request->idEmpleado;
        $emp->nombre = $request->nombre;
        $emp->paterno = $request->paterno;
        $emp->materno = $request->materno;
        $emp->nombreCompleto = $request->paterno . " " . $request->materno . $request->nombre;
        $emp->correoinstitucional = $request->correoinstitucional;
        $emp->fechaNacimiento = $request->fechaNacimiento;
        $emp->sexo = $request->sexo;
        $emp->telefono = $request->telefono;
        $emp->adscripcionFisica = $request->adscripcionFisica;
        $emp->adscripcionNominal = $request->adscripcionNominal;
        $emp->puestoLaboral = $request->puestoLaboral;
        $emp->estatus = 0;
        $emp->save();

        //return redirect('create');
        return back()->with('success', 'Servidor Público Agregado correctamente ...');
    }

    public function recep1(Request $request)
    {
        $registro = Somatometria::where('numEmpleado', '=', $request->empleado)->first();
        if ($registro) {
            $registro->estatus = 1;
            $registro->fechaRegistro = now();
            $registro->update();
            return redirect('showRecepcion1')->with('success', '¡Registro Exitoso!');
        }
    }

    public function recep2(Request $request)
    {   
        $registro = Somatometria::where('numEmpleado', '=', $request->empleado2)->first();
        if ($registro) {
            if(isset($request->btnRecep2)){
                $registro->estatus = 3;
            }
            elseif(isset($request->btnNoAceptar)){
                $registro->estatus = 2;
            }            
            $registro->fecha2 = now();
            $registro->update();
            return redirect('showRecepcion2')->with('success', '¡Actualizacion exitosa en recepcion 2!');
        }
        return redirect('showRecepcion2')->with('error', '¡Error, En la actualizacion en recepcion 2!');
    }

    public function recep3(Request $request)
    {
        // $this->validate($request,[
        //     'folio'=>'digits_between:31000000,32999999',
        //    ]);

        $registro = Somatometria::where('numEmpleado', '=', $request->empleado3)->first();        

        if ($registro) {
            $registro->estatus = 4;
            $registro->folio = $request->folio;
            $registro->fecha3 = now();
            $registro->update();
            return redirect('showRecepcion3')->with('success', '¡Finalización de Proceso!');
        }
        return redirect('showRecepcion3')->with('error', '¡Error, en la actualizacion en recepcion 2!');
    }

    public function reactivarEmp(Request $request)
    {
        $registro = Somatometria::where('numEmpleado', '=', $request->selectReactivar)->first();
        if ($registro) {
            $registro->estatus = 3;
            $registro->folio = $request->folio;
            $registro->fecha2 = now();
            $registro->update();
            return redirect('showNoAcepta')->with('success', '¡Finalización de Proceso!');
        }
        return redirect('showNoAcepta')->with('error', '¡Error, en la actualizacion en recepcion 2!');
    }

    public function reporte()
    {
        $qry = "SELECT idEmpleado, 
            numEmpleado, 
            nombre, 
            paterno, 
            materno, 
            case(estatus) 
                when 1 then 'Registro Inicial'
                when 2 then 'No acepta proceso'
                when 3 then 'Acepta proceso'
                when 4 then 'Concluye proceso' end as estatus, 
            DATE_FORMAT(fechaRegistro,'%d/%m/%Y %H:%i:%s') fecha, 
            DATE_FORMAT(fecha2,'%d/%m/%Y %H:%i:%s') fecha2,
            DATE_FORMAT(fecha3,'%d/%m/%Y %H:%i:%s') fecha3,
            folio
            FROM EmpleadosSomatometria tt 
            WHERE estatus in (1,2,3,4)        
            ORDER BY fecha ASC";

        $datos = DB::select(DB::raw($qry));

        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 1";
        $est1 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 2";
        $est2 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 3";
        $est3 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 4";
        $est4 = DB::select($qry);

        return view('reporte_concluidos', compact('datos', 'est1', 'est2', 'est3', 'est4'));
    }

    public function ReporteDia(){
        return view('reporte.homeDia');
    }

    public function reportePeriodo(Request $request){
        $qry = "SELECT idEmpleado, 
            numEmpleado, 
            nombre, 
            paterno, 
            materno, 
            case(estatus) 
                when 1 then 'Registro Inicial'
                when 2 then 'No acepta proceso'
                when 3 then 'Acepta proceso'
                when 4 then 'Concluye proceso' end as estatus, 
            DATE_FORMAT(fechaRegistro,'%d/%m/%Y %H:%i:%s') fecha, 
            DATE_FORMAT(fecha2,'%d/%m/%Y %H:%i:%s') fecha2,
            DATE_FORMAT(fecha3,'%d/%m/%Y %H:%i:%s') fecha3,
            folio
            FROM EmpleadosSomatometria tt 
            WHERE estatus IN (1,2,3,4) AND (DATE(fechaRegistro) BETWEEN '$request->fecha1' AND  '$request->fecha2' )      
            ORDER BY fecha ASC";
        
        $fecha1 = $newDate = date("d/m/Y", strtotime($request->fecha1));
        $fecha2 = $newDate = date("d/m/Y", strtotime($request->fecha2));

        $datos = DB::select(DB::raw($qry));

        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 1 AND (DATE(fechaRegistro) BETWEEN '$request->fecha1' AND  '$request->fecha2')";
        $est1 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 2 AND (DATE(fechaRegistro) BETWEEN '$request->fecha1' AND  '$request->fecha2')";
        $est2 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 3 AND (DATE(fechaRegistro) BETWEEN '$request->fecha1' AND '$request->fecha2')";
        $est3 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 4 AND (DATE(fechaRegistro) BETWEEN '$request->fecha1' AND '$request->fecha2')";
        $est4 = DB::select($qry);

        return view('reporte.porPeriodo', compact('datos', 'est1', 'est2', 'est3', 'est4','fecha1','fecha2'));
    }

    public function noAceptar(Request $request)
    {        
        $registro = Somatometria::where('numEmpleado', '=', $request->numEmpleado)->first();
        if ($registro) {
            $registro->estatus = 2;
            $registro->fecha2 = now();
            $registro->update();
            return redirect('showRecepcion2')->with('warning', '¡Concluye Proceso, No Acepta Continuar!');
        }
        return redirect('showRecepcion2')->with('error', '¡Error, En la actualizacion en recepcion 2!');
    }

    public function chkFolio(Request $request)
    {
        $valor = false;
        $msg = "";
        if ($request->ajax()) {
            if ($request->folio == "") {
                $valor = true;
                $msg = "El número de Folio es obligatorio";
            } else {
                $encontrado = Somatometria::where('folio', '=', $request->folio)->first();
                if ($encontrado) {
                    $valor = true;
                }
            }
        }
        return  json_encode(array(
            "encontrado" => $valor,
            "msg" => $msg
        ));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
