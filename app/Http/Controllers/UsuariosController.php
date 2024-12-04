<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use App\Mail\ContactanosMailable;
use App\Models\uniforme;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Barryvdh\DomPDF\Facade\Pdf;



class UsuariosController extends Controller
{
    public function regresarDatosApi()
    {
        $client = new Client([
            // Configuración opcional de Guzzle, como la URL base o el tiempo de espera
        ]);
        $response = $client->request('GET', 'http://10.210.4.117:3000/users', [
            'headers' => [
                // Reemplace {token} con su token de autenticación
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImpvaG5kb2UiLCJpYXQiOjE2ODIzODQ1OTB9.yUgeXyuJiGt87J8BF2OKBBKznnsru9bos4cj1uUSs3g',
                'Accept' => 'application/json',
            ],
            // Agregar otros parámetros de solicitud, como consultas o datos de formulario, si es necesario
        ]);
        $json = json_decode($response->getBody()->getContents()); // Convertir la respuesta JSON en un array asociativo
        // dd($json);
        $data = $json;

        return $data;
    }

    public function completosApi()
    {
        $client = new Client([
            // Configuración opcional de Guzzle, como la URL base o el tiempo de espera
        ]);
        $response = $client->request('GET', 'http://10.210.4.117:3000/completo', [
            'headers' => [
                // Reemplace {token} con su token de autenticación
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImpvaG5kb2UiLCJpYXQiOjE2ODIzODQ1OTB9.yUgeXyuJiGt87J8BF2OKBBKznnsru9bos4cj1uUSs3g',
                'Accept' => 'application/json',
            ],
            // Agregar otros parámetros de solicitud, como consultas o datos de formulario, si es necesario
        ]);
        $json = json_decode($response->getBody()->getContents()); // Convertir la respuesta JSON en un array asociativo
        $data = $json;
        return $data;
    }

    public function valida(Request $request)
    {
        $fechaHoy = date("Y-m-d");

        // Limpia variables de sesion de mensajes
        $request->session()->forget(['error', 'success', 'errorrfc', 'errorcp', 'errorclabe']);

        $this->validate($request, [
            'usuario' => 'required',
            'contrasena' => 'required',
        ]);
        $administrador = DB::table('usuariosadmin')->where('usuario', '=', $request->usuario)->where('activo', '=', 1)->get();
        $cuanto = count($administrador);
        if ($cuanto == 1 and hash::check($request->contrasena, $administrador[0]->contrasena)) {
            Session::put('nombre', $administrador[0]->usuario);
            Session::put('id_rol', $administrador[0]->id_rol);
            Session::put('sessionid_usuario', $administrador[0]->id);

            $emps = $this->completosApi();

            // recepcion 1
            $emps_recep1 = DB::table('tblTarjetaUniformes')
                ->where('status', '=', '0')
                //->where('fecha','=',$fechaHoy)
                ->orderBy('fecha')
                ->orderBy('hora')
                ->orderBy('nombre')
                ->get();

            // recepcion 2
            $emps_recep2 = DB::table('tblTarjetaUniformes')
                ->where('status', '=', '1')
                //->orWhere('status', '=', '2')
                //->where('fecha','=',$fechaHoy)
                ->orderBy('fecha')
                ->orderBy('hora')
                ->orderBy('nombre')
                ->get();

            // recepcion 3
            $emps_recep3 = DB::table('tblTarjetaUniformes')
                ->where('status', '=', '2')
                //->where('fecha','=',$fechaHoy)
                ->orderBy('fecha')
                ->orderBy('hora')
                ->orderBy('nombre')
                ->get();

            //$turnos = DB::select('SELECT * FROM tbltableroTurnos WHERE DATETIME(fechaRecepcion) = ? ORDER BY fechaRecepcion DESC LIMIT 15', [$fechaHoy]);

            // TURNOS
            $qry = "SELECT tt.numEmpleado, tt.nombre, tt.fechaRecepcion, tt.turno , tt.movimiento, tt.status,
                tu.genero, tu.unidadAdministrativa, tu.tipoPlaza, tu.entregarTarjeta, tu.administrativoConciliador,
                tu.mp, tu.pdi, tu.sp, tu.campo, tu.tactico, tu.sede 
                FROM tbltableroTurnos tt                 
                INNER JOIN tblTarjetaUniformes tu ON tt.numEmpleado = tu.numEmpleado 
                WHERE DATE(tt.fechaRecepcion) = '" . $fechaHoy . "' AND tt.status  between 1 AND 4  OR (tt.status = 5 AND tt.visible = 1)" .
                " ORDER BY tt.fechaRecepcion DESC LIMIT 15";

            //$turnos = DB::select('SELECT * FROM tbltableroTurnos ORDER BY fechaRecepcion DESC LIMIT 15');
            $turnos = DB::select($qry);

            $qry = "UPDATE tbltableroTurnos SET visible = 2 WHERE visible = 1";
            DB::select($qry);

            // En proceso
            $qry1 = "SELECT count(*) as total FROM (
                SELECT numEmpleado  as total FROM tbltableroTurnos tt WHERE DATE(tt.fechaRecepcion) = '" . $fechaHoy . "' GROUP BY numEmpleado
                ) as proceso";
            $enproceso = DB::select($qry1);

            // Concluidos
            $qry2 = "SELECT count(*) as total FROM tbltableroTurnos tt WHERE status = 5 and DATE(tt.fechaRecepcion) = '" . $fechaHoy . "'";
            $concluidos = DB::select($qry2);

            // LISTA HABERS                  
            $qry = "SELECT tt.numEmpleado, tt.nombre, tt.fechaRecepcion, tt.turno , tt.movimiento, tt.status,
                    tu.genero, tu.unidadAdministrativa, tu.tipoPlaza, tu.entregarTarjeta, tu.administrativoConciliador,
                    tu.mp, tu.pdi, tu.sp, tu.campo, tu.tactico, tu.sede 
                    FROM tbltableroTurnos tt                 
                    INNER JOIN tblTarjetaUniformes tu ON tt.numEmpleado = tu.numEmpleado " .
                "WHERE DATE(tt.fechaRecepcion) = '" . $fechaHoy . "' AND tt.status = 3 " .
                //"WHERE tt.status = 3 ".
                " AND tu.tipoPlaza IN ('AD', 'MP', 'PDI','SEGURIDAD INTERNA', 'TACTICO') " .
                " ORDER BY tt.fechaRecepcion DESC LIMIT 15";
            $turnosHabers = DB::select($qry);

            // LISTA PR77                    
            $qry = "SELECT tt.numEmpleado, tt.nombre, tt.fechaRecepcion, tt.turno , tt.movimiento, tt.status,
                    tu.genero, tu.unidadAdministrativa, tu.tipoPlaza, tu.entregarTarjeta, tu.administrativoConciliador,
                    tu.mp, tu.pdi, tu.sp, tu.campo, tu.tactico, tu.sede 
                    FROM tbltableroTurnos tt                 
                    INNER JOIN tblTarjetaUniformes tu ON tt.numEmpleado = tu.numEmpleado " .
                "WHERE DATE(tt.fechaRecepcion) = '" . $fechaHoy . "' AND tt.status = 3 " .
                //"WHERE tt.status = 3 ".
                " AND tu.tipoPlaza IN ('SP', 'PDI','SEGURIDAD INTERNA', 'TACTICO') " .
                " ORDER BY tt.fechaRecepcion DESC LIMIT 15";
            $turnosPR77 = DB::select($qry);


            switch ($administrador[0]->id_rol) {
                case '1':
                    return view('formulario', compact('emps'));
                    break;
                case '2':
                    return redirect('muestraRecepcion1');
                    //return redirect('showRecepcion1');
                    break;
                // case '3':
                //     return redirect('showRecepcion2');
                //     break;
                // case '4':
                //     return redirect('showRecepcion3');

                //     break;
                // case '5':
                //     //return view('dashboardTurnos', compact('turnos'));
                //     return view('dashboardTurnos', compact('turnos', 'concluidos', 'enproceso'));
                //     break;
                // case '6':
                //     return view('dashboardHabers', compact('turnosHabers'));
                //     break;
                // case '7':
                //     return view('dashboardPR77', compact('turnosPR77'));
                //     break;
            }
        }
        Session::flash('warning', 'El usuario/password fueron incorrectos, intente nuevamente');
        return redirect('/');
    }

    public function cerrar_sesion()
    {
        Session::forget('nombre');
        Session::forget('sessionid_usuario');
        Session::flush();
        Session::flash('error', 'Sesión Cerrada Correctamente');
        return redirect('/');
    }
}
