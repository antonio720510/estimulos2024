<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use GuzzleHttp\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use TCPDF;
use Illuminate\Support\Facades\View;

class UniformeController extends Controller
{
    public function home()
    {
        if (session('sessionid_usuario')) {
            $emps = $this->completosApi();

            return view('formulario', compact('emps'));
        } else {
            return redirect('/');
        }
    }

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

    public function limpiaIdEmp($stridEmp)
    {
        if ($stridEmp[0] === "0") {
            $idEmp = ltrim($stridEmp, "0");
        } else {
            $idEmp = $stridEmp;
        }
        return $idEmp;
    }

    // Despliega Información del Servidor Público y Detalles de los Uniformes
    public function getInfoServPub(Request $request)
    {
        if ($request->ajax()) {

            // api plantilla empleados completo
            $emps = $this->completosApi();

            $idEmp = $this->limpiaIdEmp($request->idEmp);

            //Foto
            // $urlfoto = "http://10.60.10.3/fgj/imagenes/servidores/" . $idEmp . ".jpg";
            $urlfoto = "public/imagenes/servidores/" . $idEmp . ".jpg";

            $encontrado = false;
            $conuniforme = false;
            $nombreEmpleado = "";
            $id_empleado = 0;
            $html = "";
            foreach ($emps as $emp) {
                //if ($emp->numEmpleado == $request->idEmp) {
                $html = "<br><div class='row'>";

                if ($emp->numEmpleado == $idEmp) {
                    $nombreEmpleado = $emp->paterno . " " . $emp->materno . " " . $emp->nombre;
                    //$idEmp = $emp->idEmpleado;
                    $data = array(
                        'idEmpleado' => $emp->idEmpleado,
                        'nombre' => $emp->paterno . " " . $emp->materno . " " . $emp->nombre,
                        'numEmpleado' => $emp->numEmpleado,
                        'adscripcionActual' => $emp->adscripcionActual,
                        'desPuestoLaboral' => $emp->desPuestoLaboral,
                        'estatus' => $emp->activo
                    );
                    $html .= '<div class="col-md-4" align="right"><img src="' . $urlfoto . '" class="img-fluid rounded-start" alt="..." width="125px">';
                    $html .= '</div>';
                    $html .= "<div class='col-md-8' align='left'>";
                    $html .= '<p class="card-text"><b>NOMBRE:</b> ' . $emp->paterno . " " . $emp->materno . " " . $emp->nombre . '</p>';
                    $html .= '<p class="card-text"><b>CLAVE SERVIDOR PÚBLICO:</b> ' . $emp->numEmpleado . '</p>';
                    $html .= '<p class="card-text"><b>PUESTO LABORAL:</b> ' . $emp->desPuestoLaboral . '</p>';
                    $html .= '<p class="card-text"><b>ADSCRIPCIÓN ACTUAL:</b> ' . $emp->adscripcionActual . '</p>';
                    $html .= '<p class="card-text"><b>ESTATUS:</b> ' . (($emp->activo == "S") ? "ACTIVO" : "NO ACTIVO") . '</p>';
                    $html .= '</div>';

                    $encontrado = true;
                    break;
                }
                $html .= "</div><br>";
            }

            $sql = "Select * from tbldocumentosimg where idReferencia =" . $idEmp . " and cveTipoDocumento=157";
            $foto = DB::connection('mysql_2')->select($sql);

            // PRENDAS
            //Registro Uniforme
            $html .= "<br><div class='col-md-12'><table class='table table-striped table-condensed'>";
            $sql = "SELECT id, nomEmpleado, date_format(fechaRecepcion, '%d/%m/%Y') AS fechaRecepcion FROM registro WHERE nomEmpleado = '" . $nombreEmpleado . "'";
            $regis = DB::select(DB::raw($sql));
            $id_registro = (isset($regis[0]->id)) ? $regis[0]->id : null;

            if ($id_registro && $regis[0]->fechaRecepcion != NULL) {
                $html = '<div class="alert alert-warning" role="alert"><center>Uniforme Entregado el día!! ' . $regis[0]->fechaRecepcion . '</center></div>';
                return  json_encode(array(
                    "html" => $html,
                    "status" => 1
                ));
            }

            if ($id_registro) {
                $conuniforme = true;
                //Tipo Uniforme
                $sql = "SELECT id, tipouniforme FROM uniformeempleado WHERE registro_id = " . $id_registro;
                $uniformes = DB::select(DB::raw($sql));
                foreach ($uniformes as $uniforme) {
                    $id_uniformeepleado = $uniforme->id;
                    $html .= "<tr><th colspan='2'>UNIFORME " . $uniforme->tipouniforme . "</th></tr>";
                    $html .= "<tr><th>PRENDA</th><th>TALLA</th></tr>";
                    if ($id_uniformeepleado) {
                        //Detalle Uniforme
                        $sql = "SELECT tipoprenda, talla FROM detalleuniformeempleado WHERE uniformeempleado_id = " . $id_uniformeepleado;
                        $prendas = DB::select(DB::raw($sql));
                        foreach ($prendas as $prenda) {
                            $html .= "<tr><td>" . $prenda->tipoprenda . "</td><td>" . $prenda->talla . "</td></tr>";
                        }
                    }
                }
            }
            $html .= "</table></div>";

            if (!$encontrado || !$conuniforme) {
                $html = '';
                //return $html;
                return json_encode(array("html" => '', "status" => 0));
            }

            return json_encode(array("html" => $html, "status" => 2));
        }
    }

    public function datosemp(Request $request)
    {
        if ($request->ajax()) {
            // api plantilla empleados completo
            //$emps = $this->completosApi();

            $sql = "SELECT DISTINCT 
                    s.idStaff as idEmpleado,
                    s.staffNumber as numEmpleado,
                    s.rfc, 
                    s.curp, 
                    s.name as nombre,
                    REPLACE(s.pName, '�', 'Ñ') as paterno, 
                    REPLACE(s.mName, '�', 'Ñ') as materno, 
                    s2.socialSecurityKey as claveIssemym, 
                    s.startJobDate fechaIngreso, 
                    (SELECT jt.nameJobType
                    from  jobstaff js 
                    join jobs jo on js.keyJob = jo.keyJob
                    join jobtypes jt on COALESCE(jo.keyJobType,1) = jt.keyJobType
                    where js.valid = 1 and js.enabled = 1 and js.idStaff = s.idStaff 
                    LIMIT 1
                    ) as desPuestoLaboral, 
                    (SELECT a.name 
                        from areas a 
                        join jobstaff js on a.idArea = js.idArea
                        where a.enabled = 1 and js.idStaff = s.idStaff
                        LIMIT 1
                    ) as adscripcionActual
                    from staff s
                    left join staffsocialsecurity s2 on s.idStaff = s2.idStaff and s2.enabled = 1
                    left join genders g on s.keyGenre = g.keyGender
                    left join jobstaff j on s.idStaff = j.idStaff
                    where s.enabled = 1 
                    and s.keyStat in (1, 3) 
                    and j.valid = 1
                    and j.enabled = 1
                    and s.staffNumber ='" . $request->idEmp . "'";
            $emp = DB::connection('mysql_sapp')->selectOne($sql);

            if ($emp) {
                //Foto 
                $urlfoto = "http://10.210.4.114/fgj/imagenes/servidores/" . $request->idEmp . ".jpg";
                $html = "";

                $html = "<br><div class='row'>";
                $html .= '<div class="col-md-4" align="right"><img src="' . $urlfoto . '" class="img-fluid rounded-start" alt="..." width="125px">';
                $html .= '</div>';
                $html .= "<div class='col-md-8' align='left'>";
                $html .= '<p class="card-text"><b>NOMBRE:</b> ' . $emp->paterno . " " . $emp->materno . " " . $emp->nombre . '</p>';
                $html .= '<p class="card-text"><b>CLAVE SERVIDOR PÚBLICO:</b> ' . $emp->numEmpleado . '</p>';
                $html .= '<p class="card-text"><b>PUESTO LABORAL:</b> ' . $emp->desPuestoLaboral . '</p>';
                $html .= '<p class="card-text"><b>ADSCRIPCIÓN ACTUAL:</b> ' . $emp->adscripcionActual . '</p>';
                //$html .= '<p class="card-text"><b>ESTATUS:</b> ' . (($emp->activo == "S") ? "ACTIVO" : "NO ACTIVO") . '</p>';                    
                $html .= '</div>';

                $html .= "</div><br>";

                return  json_encode(array(
                    "html" => $html,
                    "status" => 1
                ));
            }else{
                $html = "";
                $html .= "<br>";
                $html .= "<div class='row'>";
                $html .= '<div class="col-md-4" align="right">';
                $html .= '</div>';
                $html .= "</div><div class='col-md-8' align='left'>";  
                $html .= '<p  class="card-text"><b>Error, Servidor Público NO activo</b>';
                $html .= "</div>";
                $html .= "</div><br>";
                return  json_encode(array(
                    "html" => $html,
                    "status" => 0
                ));
            }
        }
    }

    // datosemp2
    public function datosemp2(Request $request)
    {
        if ($request->ajax()) {
            // api plantilla empleados completo
            $emps = $this->completosApi();

            $idEmp = $this->limpiaIdEmp($request->idEmp);

            //Foto
            //$urlfoto = "http://10.60.10.3/fgj/imagenes/servidores/" . $idEmp . ".jpg";
            $urlfoto = "public/imagenes/servidores/" . $idEmp . ".jpg";
            $html = "";

            foreach ($emps as $emp) {
                //if ($emp->numEmpleado == $request->idEmp) {
                $html = "<br><div class='row'>";

                if ($emp->numEmpleado == $idEmp) {
                    $nombreEmpleado = $emp->paterno . " " . $emp->materno . " " . $emp->nombre;
                    //$idEmp = $emp->idEmpleado;
                    $data = array(
                        'idEmpleado' => $emp->idEmpleado,
                        'nombre' => $emp->paterno . " " . $emp->materno . " " . $emp->nombre,
                        'numEmpleado' => $emp->numEmpleado,
                        'adscripcionActual' => $emp->adscripcionActual,
                        'desPuestoLaboral' => $emp->desPuestoLaboral,
                        'estatus' => $emp->activo
                    );
                    $html .= '<div class="col-md-4" align="right"><img src="' . $urlfoto . '" class="img-fluid rounded-start" alt="..." width="125px">';
                    $html .= '</div>';
                    $html .= "<div class='col-md-8' align='left'>";
                    $html .= '<p class="card-text"><b>NOMBRE:</b> ' . $emp->paterno . " " . $emp->materno . " " . $emp->nombre . '</p>';
                    $html .= '<p class="card-text"><b>CLAVE SERVIDOR PÚBLICO:</b> ' . $emp->numEmpleado . '</p>';
                    $html .= '<p class="card-text"><b>PUESTO LABORAL:</b> ' . $emp->desPuestoLaboral . '</p>';
                    $html .= '<p class="card-text"><b>ADSCRIPCIÓN ACTUAL:</b> ' . $emp->adscripcionActual . '</p>';
                    $html .= '<p class="card-text"><b>ESTATUS:</b> ' . (($emp->activo == "S") ? "ACTIVO" : "NO ACTIVO") . '</p>';
                    $html .= '</div>';

                    break;
                }
                $html .= "</div><br>";
            }

            return  json_encode(array(
                "html" => $html,
                "status" => 1
            ));
        }
    }


    // datosemp3
    public function datosemp3(Request $request)
    {
        if ($request->ajax()) {
            // api plantilla empleados completo
            $emps = $this->completosApi();

            $idEmp = $this->limpiaIdEmp($request->idEmp);

            //Foto
            //$urlfoto = "http://10.60.10.3/fgj/imagenes/servidores/" . $idEmp . ".jpg";
            $urlfoto = "public/imagenes/servidores/" . $idEmp . ".jpg";
            $html = "";

            foreach ($emps as $emp) {
                //if ($emp->numEmpleado == $request->idEmp) {
                $html = "<br><div class='row'>";

                if ($emp->numEmpleado == $idEmp) {
                    $nombreEmpleado = $emp->paterno . " " . $emp->materno . " " . $emp->nombre;
                    //$idEmp = $emp->idEmpleado;
                    $data = array(
                        'idEmpleado' => $emp->idEmpleado,
                        'nombre' => $emp->paterno . " " . $emp->materno . " " . $emp->nombre,
                        'numEmpleado' => $emp->numEmpleado,
                        'adscripcionActual' => $emp->adscripcionActual,
                        'desPuestoLaboral' => $emp->desPuestoLaboral,
                        'estatus' => $emp->activo
                    );
                    $html .= '<div class="col-md-4" align="right"><img src="' . $urlfoto . '" class="img-fluid rounded-start" alt="..." width="125px">';
                    $html .= '</div>';
                    $html .= "<div class='col-md-8' align='left'>";
                    $html .= '<p class="card-text"><b>NOMBRE:</b> ' . $emp->paterno . " " . $emp->materno . " " . $emp->nombre . '</p>';
                    $html .= '<p class="card-text"><b>CLAVE SERVIDOR PÚBLICO:</b> ' . $emp->numEmpleado . '</p>';
                    $html .= '<p class="card-text"><b>PUESTO LABORAL:</b> ' . $emp->desPuestoLaboral . '</p>';
                    $html .= '<p class="card-text"><b>ADSCRIPCIÓN ACTUAL:</b> ' . $emp->adscripcionActual . '</p>';
                    $html .= '<p class="card-text"><b>ESTATUS:</b> ' . (($emp->activo == "S") ? "ACTIVO" : "NO ACTIVO") . '</p>';
                    $html .= '</div>';
                    // $html .= '</div>';

                    $encontrado = true;
                    break;
                }
                $html .= "</div><br>";
            }

            return  json_encode(array(
                "html" => $html,
                "status" => 1
            ));
        }
    }



    // Descarga Formato Comprobante PDF
    public function comprobantepdf(Request $request)
    {
        if (session('sessionid_usuario')) {
            $idEmp = $this->limpiaIdEmp($request->hcvepub);

            $emps = $this->completosApi();

            // Datos Empleado
            $row = array();
            $nombreEmpleado = "";
            foreach ($emps as $emp) {
                if ($emp->numEmpleado == $idEmp) {
                    $nombreEmpleado = $emp->paterno . " " . $emp->materno . " " . $emp->nombre;
                    $row = array(
                        'idEmpleado' => $emp->idEmpleado,
                        'nombre' => $emp->paterno . " " . $emp->materno . " " . $emp->nombre,
                        'numEmpleado' => $emp->numEmpleado,
                        'adscripcionActual' => $emp->adscripcionActual,
                        'desPuestoLaboral' => $emp->desPuestoLaboral,
                        'estatus' => (($emp->activo == "S") ? "ACTIVO" : "NO ACTIVO"),
                    );
                    break;
                }
            }

            $dataEmp = json_decode(json_encode($row));

            //Actualiza Fecha de Recepcion en tabla registro
            $recepcion = DB::table('registro')
                ->where('nomEmpleado', $nombreEmpleado)
                ->update([
                    'fechaRecepcion' => date('Y-m-d h:i:s'),
                ]);

            // Registro Uniformes 949867689
            $sql = "SELECT id, nomEmpleado FROM registro WHERE nomEmpleado = '" . $nombreEmpleado . "'";
            $regis = DB::select(DB::raw($sql));
            $id_registro = (isset($regis[0]->id)) ? $regis[0]->id : null;

            //Tipo Uniforme
            $sql = "SELECT id, tipouniforme FROM uniformeempleado WHERE registro_id = " . $id_registro;
            $uniformes = DB::select(DB::raw($sql));

            //Detalle uniforme
            $detalle = array();
            foreach ($uniformes as $uniforme) {
                $sql = "SELECT uniformeempleado_id, tipoprenda, talla FROM detalleuniformeempleado WHERE uniformeempleado_id = " . $uniforme->id;
                $prendas = DB::select(DB::raw($sql));
                foreach ($prendas as $prenda) {
                    $detalle[] = $prenda;
                }
            }


            $detalleprenda = json_decode(json_encode($detalle));

            //$urlfoto = "http://10.60.10.3/fgj/imagenes/servidores/" . $idEmp . ".jpg";
            $urlfoto = "public/imagenes/servidores/" . $idEmp . ".jpg";

            $pdf = PDF::loadView(
                'recibopdf',
                array(
                    'clave' => $idEmp,
                    'urlfoto' => $urlfoto,
                    'dataEmp' => $dataEmp,
                    'uniformes' => $uniformes,
                    'prendas' => $detalleprenda,
                )
            );

            // download PDF file with download method
            return $pdf->download('pdf_file.pdf');
        } else {
            return redirect('/');
        }
    }

    public function comprobantespdf()
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '3600');
        set_time_limit(-1);

        $emps = $this->completosApi();
        //dd($emps);

        $sql = "SELECT * FROM tblTarjetaUniformes 
        WHERE numEmpleado NOT IN ('BAJA', 'ADICIONALES', 'STOCK','INACTIVO', 'SUSPENSION') 
        AND sede ='ATIZAPAN'               
        ORDER BY item ASC";
        // ORDER BY unidadAdministrativa ASC, item ASC";
        // and numEmpleado in ('210025049')    
        // AND unidadAdministrativa ='AGENCIA DE INVESTIGACION CRIMINAL' 
        // ORDER BY unidadAdministrativa, fecha, hora, sede";

        $banorte = DB::select(DB::raw($sql));

        $data[] = array();

        $pdf = new TCPDF();
        $pdf->setPrintHeader(false); // quitar linea de encabezado
        $pdf->setPrintFooter(false);
        //$banorte = array_slice($banorte, 0, 230);

        $uniformes = null;
        $detalle = null;

        foreach ($banorte as $b) {
            foreach ($emps as $emp) {
                $nombreEmpleado = $emp->paterno . " " . $emp->materno . " " . $emp->nombre;

                //if ($b->nombre == $nombreEmpleado && $b->numEmpleado == $emp->numEmpleado) {
                if ($b->numEmpleado == $emp->numEmpleado) {
                    $cveEmpleado = $emp->numEmpleado;
                    $adscripcionActual = $emp->adscripcionActual;

                    //$urlfoto = "http://10.60.10.3/fgj/imagenes/servidores/" . $cveEmpleado . ".jpg";
                    $urlfoto = "public/imagenes/servidores/" . $cveEmpleado . ".jpg";

                    //$plaza = $registro->plaza;
                    //$fechaRecepcion = ($registro->fechaRecepcion == NULL) ? "NO" : date("d/m/Y", strtotime($registro->fechaRecepcion));                                     

                    $sql = "SELECT id, nomEmpleado FROM registro WHERE nomEmpleado = '" . htmlspecialchars($nombreEmpleado, ENT_QUOTES)  . "'";
                    $regis = DB::select(DB::raw($sql));
                    $id_registro = (isset($regis[0]->id)) ? $regis[0]->id : null;

                    if ($regis && ($b->administrativoConciliador == 1 || $b->mp == 1 || $b->pdi == 1 || $b->sp == 1 || $b->campo == 1 || $b->tactico == 1)) {
                        //Tipo Uniforme
                        $sql = "SELECT id, tipouniforme FROM uniformeempleado WHERE registro_id = " . $id_registro;
                        $uniformes = DB::select(DB::raw($sql));

                        //Detalle uniforme
                        $detalle = array();
                        foreach ($uniformes as $uniforme) {
                            $sql = "SELECT uniformeempleado_id, tipoprenda, talla FROM detalleuniformeempleado WHERE uniformeempleado_id = " . $uniforme->id;
                            $prendas = DB::select(DB::raw($sql));
                            foreach ($prendas as $prenda) {
                                $detalle[] = $prenda;
                            }
                        }
                    } else {
                        $uniformes = null;
                        $detalle = null;
                    }

                    $pdf->AddPage();

                    // Generar contenido HTML para cada hoja del PDF
                    //$urlfoto = "http://10.60.10.3/fgj/imagenes/servidores/" . $cveEmpleado . ".jpg";
                    $urlfoto = "public/imagenes/servidores/" . $cveEmpleado . ".jpg";

                    $html = View::make(
                        'recibo2pdf',
                        [
                            'emp' => $emp,
                            'tarjeta' => $b->entregarTarjeta,
                            'urlfoto' => $urlfoto,
                            'uniformes' => $uniformes,
                            'prendas' => $detalle,
                            'sede' => $b->sede,
                            'unidad' => $b->unidadAdministrativa,
                            'dia' => $b->dia,
                            'hora' => $b->hora,
                            'consec' => $b->item,
                            'admin' => $b->administrativoConciliador,
                            'mp' => $b->mp,
                            'pdi' => $b->pdi,
                            'sp' => $b->sp,
                            'campo' => $b->campo,
                            'tactico' => $b->tactico,
                            'tipoPlaza' => $b->tipoPlaza,
                            'genero' => $b->genero
                        ]
                    )->render();

                    // Escribir el contenido HTML en el PDF
                    $pdf->writeHTML($html);
                }
            }
        }

        $pdf->Output('archivo_pdf.pdf', 'I');
    }

    public function listado()
    {
        // ini_set('memory_limit', '-1');
        // ini_set('max_execution_time', '3600');
        // set_time_limit(-1);

        set_time_limit(0);
        ini_set('pcre.backtrack_limit', '10000000');
        ini_set('memory_limit', '4060M');

        $sede = "ATIZAPAN";

        $sql = "SELECT distinct(unidadAdministrativa) FROM tblTarjetaUniformes WHERE sede='" . $sede . "'";
        $unidad = DB::select(DB::raw($sql));

        //dd($banorte);     
        $pdf = new TCPDF();
        $pdf->setPrintHeader(false); // quitar linea de encabezado
        $pdf->setPrintFooter(false);
        //$banorte = array_slice($banorte, 0, 5);  


        foreach ($unidad as $u) {

            if ($sede == "TOLUCA")
                $direccion = "En relación a la circular 14/2023, anexo el listado del personal adscrito en " .
                    $u->unidadAdministrativa . ", que deberá presentarse en Av. José maría Morelos y Pavón, 1300 Ote, San Sebastián, Toluca, México en los días y horas siguientes:";

            if ($sede == "ATIZAPAN")
                $direccion = "En relación a la circular 14/2023, anexo el listado del personal adscrito en " .
                    $u->unidadAdministrativa . ", que deberá presentarse en el Centro de Justicia de Atizapán, ubicado en Boulevard Adolfo López Mateos, número 91, Colonia el Potrero, C.P. 54500, en los días y horas siguientes:";

            if ($sede == "ECATEPEC")
                $direccion = " En relación a la circular 14/2023, anexo el listado del personal adscrito en " .
                    $u->unidadAdministrativa . ", que deberá presentarse en Centro de Justicia San Agustín, ubicado en Avenida San Agustín Poniente 4, Olímpica 68, Ecatepec, C.P. 55130, en los días y horas siguientes:";

            $sql = "SELECT nombre, sede, unidadAdministrativa, dia, hora, item FROM tblTarjetaUniformes 
            WHERE numEmpleado NOT IN ('BAJA', 'ADICIONALES', 'STOCK','INACTIVO', 'SUSPENSION') 
            AND sede ='" . $sede . "'   
            AND unidadAdministrativa ='" . $u->unidadAdministrativa .
                "' ORDER BY unidadAdministrativa ASC, item ASC";
            // and numEmpleado in ('210025049')    
            // AND unidadAdministrativa ='AGENCIA DE INVESTIGACION CRIMINAL' 
            // ORDER BY unidadAdministrativa, fecha, hora, sede";

            $banorte = DB::select(DB::raw($sql));
            //$banorte = array_slice($banorte, 0, 55);  
            //dd($banorte);

            $pdf->AddPage();

            $html = View::make(
                'listadopdf',
                [
                    'datos' => $banorte,
                    'unidad' => $u->unidadAdministrativa,
                    'direccion' => $direccion
                ]
            )->render();

            // Escribir el contenido HTML en el PDF
            $pdf->writeHTML($html);
        }
        $pdf->Output('archivo_pdf.pdf', 'I');
    }

    public function fichas()
    {
        if (session('sessionid_usuario')) {

            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', '3600');
            set_time_limit(-1);

            $api = $this->completosApi();
            $query = "SELECT * from tblbanorteuniformes";
            $empleados = DB::select(DB::raw($query));

            $pdf = new TCPDF();

            $empleados = array_slice($empleados, 0, 10);
            foreach ($empleados as $emp) {
                foreach ($api as $a) {
                    if ($emp->numEmpleado == $a->numEmpleado) {
                        $emp->unidadAdm = $a->idUnidadAdmin;
                        $emp->puesto = $a->desPuestoLaboral;
                        $emp->activo = $a->activo;
                        if ($emp->entregarTarjeta == 'SI') {
                            $emp->banorte = 'ENTREGAR TARJETA BANORTE';
                        } else {
                            $emp->banorte = '';
                        }

                        $sql = "SELECT id, nomEmpleado FROM registro WHERE nomEmpleado = '" . $emp->nombre . "'";
                        $regis = DB::select(DB::raw($sql));
                        $id_registro = (isset($regis[0]->id)) ? $regis[0]->id : null;

                        if ($id_registro != '') {
                            $sqlu = "SELECT id, tipouniforme FROM uniformeempleado WHERE registro_id = " . $id_registro;
                            $uniformes = DB::select(DB::raw($sqlu));

                            foreach ($uniformes as $uniforme) {
                                $sqld = "SELECT uniformeempleado_id, tipoprenda, talla FROM detalleuniformeempleado WHERE uniformeempleado_id = " . $uniforme->id;
                                $prendas = DB::select(DB::raw($sqld));
                                foreach ($prendas as $prenda) {
                                    $detalle[] = $prenda;
                                }
                            }

                            // Agregar una nueva página al PDF
                            $pdf->AddPage();

                            // Generar contenido HTML para cada hoja del PDF
                            //$urlfoto = "http://10.60.10.3/fgj/imagenes/servidores/" . $emp->numEmpleado . ".jpg";
                            $urlfoto = "public/imagenes/servidores/" . $emp->numEmpleado . ".jpg";
                            $html = View::make('recibopdf', ['emp' => $emp, 'uniformes' => $uniformes, 'prendas' => $prendas, 'detalle' => $detalle, 'urlfoto' => $urlfoto])->render();

                            // Escribir el contenido HTML en el PDF
                            $pdf->writeHTML($html);
                        } else {
                            $uniformes = [];
                            $prendas = [];
                            $detalle = [];
                            // Agregar una nueva página al PDF
                            $pdf->AddPage();

                            // Generar contenido HTML para cada hoja del PDF
                            $urlfoto = "http://10.60.10.3/fgj/imagenes/servidores/" . $emp->numEmpleado . ".jpg";
                            $urlfoto = "public/imagenes/servidores/" . $emp->numEmpleado . ".jpg";

                            $html = View::make('recibopdf', ['emp' => $emp, 'uniformes' => $uniformes, 'prendas' => $prendas, 'detalle' => $detalle, 'urlfoto' => $urlfoto])->render();

                            // Escribir el contenido HTML en el PDF
                            $pdf->writeHTML($html);
                        }
                    }
                }
            }

            $pdf->Output('archivo_pdf.pdf', 'I');
        } else {
            return redirect('/');
        }
    }

    public function cantidad($tipoprenda, $tipoUniforme)
    {
        switch ($tipoUniforme) {
            case "ADMINISTRATIVO":
                if ($tipoprenda == "PANTALON")
                    return "2";
                if ($tipoprenda == "CAMISA")
                    return "4";
                if ($tipoprenda  == "SACO")
                    return "2";
                if ($tipoprenda  == "CHALECO")
                    return "2";
                return "X";
            case "ADMINISTRATIVO MP":
                if ($tipoprenda == "PANTALON")
                    return "2";
                if ($tipoprenda == "CAMISA")
                    return "4";
                if ($tipoprenda  == "SACO")
                    return "2";
                if ($tipoprenda  == "CHALECO")
                    return "2";
                return "X";
            case "EJECUTIVO PDI":
                if ($tipoprenda == "PANTALON")
                    return "2";
                if ($tipoprenda == "CAMISA")
                    return "4";
                if ($tipoprenda  == "SACO")
                    return "2";
                return "X";
            case "CAMPO";
                if ($tipoprenda == "CAMISOLA OPERATIVA")
                    return "1";
                if ($tipoprenda == "PANTALON PIE TIERRA")
                    return "2";
                if ($tipoprenda  == "BOTA TACTICA")
                    return "1";
                if ($tipoprenda == "CINTURON")
                    return "1";
                if ($tipoprenda == "PLAYERA TIPO POLO")
                    return "1";
                if ($tipoprenda  == "GUANTES")
                    return "1";
                return "X";
            case "TACTICO";
                if ($tipoprenda == "CAMISOLA TACTICA")
                    return "1";
                if ($tipoprenda == "PANTALON TACTICO")
                    return "2";
                if ($tipoprenda  == "BOTA TACTICA")
                    return "1";
                if ($tipoprenda == "CINTURON TACTICO")
                    return "1";
                if ($tipoprenda == "PLAYERA RAPIDA")
                    return "1";
                if ($tipoprenda  == "GUANTES TACTICOS")
                    return "1";
                if ($tipoprenda  == "CASCO FAST")
                    return "1";
                return "X";
        }
    }

    public function turno()
    {
        $fechaHoy = date("Y-m-d");
        //$fechaHoy = "2023-08-07";
        $turno = DB::select('SELECT turno FROM tblTarjetaUniformes WHERE DATE(fechaTurno) = ? order by turno desc limit 1', [$fechaHoy]);
        if ($turno) {
            foreach ($turno as $t) {
                return $t->turno + 1;
            }
        } else
            return 1;
    }

    public function recepcionTarjeta(Request $request)
    {
        //dd($this->turno());
        $fechaHoy = date("Y-m-d H:i:s");
        $numTurno = $this->turno();
        $affected = DB::update(
            'update tblTarjetaUniformes set status = 1, turno = ?, fechaTurno = ? where numEmpleado = ?',
            [$numTurno, $fechaHoy, $request->idEmp]
        );

        // Insertar registro para tabla dashboard
        DB::insert(
            'insert into tbltableroTurnos (numEmpleado, nombre, fechaRecepcion, turno, movimiento, status) values (?, ?, ?, ?, ?, ?)',
            [$request->idEmp, $request->nombre, now(), $numTurno, "BANORTE", 1]
        );

        //return redirect('showRecepcion1');
        return redirect()->route('muestraTurno', ['turno' => $numTurno]);
    }

    public function muestraTurno(Request $request)
    {
        return view('showTurno', ['numTurno' => $request->turno]);
    }

    public function showRecepcion1()
    {
        //$emps = $this->completosApi();

        $hoy = date_format(now(), 'Y-m-d'); // fecha del dia en curso        

        // Querys para reportes estadísticos
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 1 AND (DATE(fechaRegistro) BETWEEN '$hoy' AND  '$hoy')";
        $est1 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 2 AND (DATE(fecha2) BETWEEN '$hoy' AND  '$hoy')";
        $est2 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 3 AND (DATE(fecha2) BETWEEN '$hoy' AND '$hoy')";
        $est3 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 4 AND (DATE(fecha3) BETWEEN '$hoy' AND '$hoy')";
        $est4 = DB::select($qry);

        $sql = "Select * from EmpleadosSomatometria where estatus=0";
        $emps = DB::select(DB::raw($sql));

        return view('recepcion1', compact('emps', 'est1', 'est2', 'est3', 'est4'));
    }

    public function showRecepcion2()
    {
        $hoy = date_format(now(), 'Y-m-d'); // fecha del dia en curso        

        // Querys para reportes estadísticos
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 1 AND (DATE(fechaRegistro) BETWEEN '$hoy' AND  '$hoy')";
        $est1 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 2 AND (DATE(fecha2) BETWEEN '$hoy' AND  '$hoy')";
        $est2 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 3 AND (DATE(fecha2) BETWEEN '$hoy' AND '$hoy')";
        $est3 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 4 AND (DATE(fecha3) BETWEEN '$hoy' AND '$hoy')";
        $est4 = DB::select($qry);

        $sql = "Select * from EmpleadosSomatometria where estatus=1 order by fechaRegistro ASC";
        $emps_recep2 = DB::select(DB::raw($sql));

        return view('recepcion2', compact('emps_recep2', 'est1', 'est2', 'est3', 'est4'));
    }

    public function showRecepcion3()
    {
        $hoy = date_format(now(), 'Y-m-d'); // fecha del dia en curso        

        // Querys para reportes estadísticos
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 1 AND (DATE(fechaRegistro) BETWEEN '$hoy' AND  '$hoy')";
        $est1 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 2 AND (DATE(fecha2) BETWEEN '$hoy' AND  '$hoy')";
        $est2 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 3 AND (DATE(fecha2) BETWEEN '$hoy' AND '$hoy')";
        $est3 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 4 AND (DATE(fecha3) BETWEEN '$hoy' AND '$hoy')";
        $est4 = DB::select($qry);

        $sql = "Select * from EmpleadosSomatometria where estatus = 3 order by fechaRegistro ASC";
        $emps_recep3 = DB::select(DB::raw($sql));
        return view('recepcion3', compact('emps_recep3', 'est1', 'est2', 'est3', 'est4'));
    }

    public function showNoAcepta()
    {
        $hoy = date_format(now(), 'Y-m-d'); // fecha del dia en curso        

        // Querys para reportes estadísticos
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 1 AND (DATE(fechaRegistro) BETWEEN '$hoy' AND  '$hoy')";
        $est1 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 2 AND (DATE(fecha2) BETWEEN '$hoy' AND  '$hoy')";
        $est2 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 3 AND (DATE(fecha2) BETWEEN '$hoy' AND '$hoy')";
        $est3 = DB::select($qry);
        $qry = "Select count(*) as total from EmpleadosSomatometria where estatus = 4 AND (DATE(fecha3) BETWEEN '$hoy' AND '$hoy')";
        $est4 = DB::select($qry);

        $sql = "Select * from EmpleadosSomatometria where estatus = 2 order by fechaRegistro ASC";
        $emps = DB::select(DB::raw($sql));
        return view('reactivar', compact('emps', 'est1', 'est2', 'est3', 'est4'));
    }


    public function recepcionUniforme(Request $request)
    {
        $numTurno = $this->turno();
        $fechaHoy = date("Y-m-d H:i:s");
        $affected = DB::update(
            'update tblTarjetaUniformes set status = 2 , turno = ? , fechaTurno = ? where numEmpleado = ?',
            [$numTurno, $fechaHoy, $request->idEmp]
        );

        // Insertar registro para tabla dashboard
        DB::insert(
            'insert into tbltableroTurnos (numEmpleado, nombre, fechaRecepcion, turno, movimiento, status) values (?, ?, ?, ?, ?, ?)',
            [$request->idEmp, $request->nombre, now(), $numTurno, "DOCUMENTACION", 2]
        );

        //return redirect('showRecepcion1');
        return redirect()->route('muestraTurno', ['turno' => $numTurno]);
    }

    // Recepcion 2, Concluye trámite tarjeta y continua trámite uniforme
    public function recepcion2TarjetaUniforme(Request $request)
    {
        // Establece 2 = recepcion uniforme
        $affected = DB::update(
            'update tblTarjetaUniformes set status = 3 where numEmpleado = ?',
            [$request->idEmp]
        );

        // Insertar registro Tarjeta para tabla dashboard
        // DB::insert(
        //     'insert into tbltableroTurnos (numEmpleado, nombre, fechaRecepcion, turno, movimiento, status) values (?, ?, ?, ?, ?, ?)',
        //     [$request->idEmp, $request->nombre, now(), $request->turno, "TRAMITE TARJETA CONCLUIDA", 1]
        // );

        $affected = DB::update(
            'update tbltableroTurnos set status = 0 where numEmpleado = ?',
            [$request->idEmp]
        );

        // Insertar registro Uniforme para tabla dashboard

        DB::insert(
            'insert into tbltableroTurnos (numEmpleado, nombre, fechaRecepcion, turno, movimiento, status) values (?, ?, ?, ?, ?, ?)',
            [$request->idEmp, $request->nombre, now(), $request->turno, "UNIFORMES", 3]
        );

        return redirect('showRecepcion2');
    }

    // Recepcion 2, sólo Tarjeta concluye Proceso
    public function recepcion2Tarjeta(Request $request)
    {
        // Establece 3 = CONCLUSION PROCESO
        $affected = DB::update(
            'update tblTarjetaUniformes set status = 5 where numEmpleado = ?',
            [$request->idEmp]
        );

        $affected = DB::update(
            'update tbltableroTurnos set status = 0 where numEmpleado = ?',
            [$request->idEmp]
        );

        // Insertar registro Tarjeta para tabla dashboard
        DB::insert(
            'insert into tbltableroTurnos (numEmpleado, nombre, fechaRecepcion, turno, movimiento, status, visible) values (?, ?, ?, ?, ?, ?, ?)',
            [$request->idEmp, $request->nombre, now(), $request->turno, "PROCESO CONCLUIDO", 5, 1]
        );

        return redirect('showRecepcion2');
    }

    //Concluye proceso con Uniforme
    public function recepcion3Uniforme(Request $request)
    {
        $affected = DB::update(
            'update tblTarjetaUniformes set status = 5 where numEmpleado = ?',
            [$request->idEmp]
        );

        $affected = DB::update(
            'update tbltableroTurnos set status = 0 where numEmpleado = ?',
            [$request->idEmp]
        );

        // Insertar registro para tabla dashboard
        DB::insert(
            'insert into tbltableroTurnos (numEmpleado, nombre, fechaRecepcion, turno, movimiento, status, visible) values (?, ?, ?, ?, ?, ?,?)',
            [$request->idEmp, $request->nombre, now(), $request->turno, "PROCESO CONCLUIDO", 5, 1]
        );

        return redirect('showRecepcion3');
    }

    public function listaTurnos()
    {
        $fechaHoy = date("Y-m-d");
        //$fechaHoy = "2023-08-04";
        //$turnos = DB::select('SELECT * FROM tbltableroTurnos WHERE DATETIME(fechaRecepcion) = ? ORDER BY fechaRecepcion DESC LIMIT 15', [$fechaHoy]);
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

        return view('dashboardTurnos', compact('turnos', 'concluidos', 'enproceso'));
    }

    public function reporteConcluidos()
    {

        $qry = "SELECT numEmpleado, nombre, DATE_FORMAT(fechaRecepcion,'%d/%m/%Y') fecha, DATE_FORMAT(fechaRecepcion,'%H:%i:%s') hora 
        FROM tbltableroTurnos tt 
        WHERE status = 5
        ORDER BY hora ASC";

        $datos = DB::select(DB::raw($qry));

        return view('reporte_concluidos', compact('datos'));
    }

    public function sincronizaRegistros()
    {
        $qry = "select * from actualizainfo WHERE estatus ='ENTREGADO'";
        $datos = DB::select(DB::raw($qry));

        $nombreArchivo = "logsinc.txt";
        $archivo = fopen($nombreArchivo, "w");

        DB::beginTransaction();

        try {
            foreach ($datos as $d) {
                $fechaHora = $d->fechaentrega . " " . $d->hora;
                //dd($d);
                //$sql = "update tblTarjetaUniformes set status='5', fechaTurno='$fechaHora' where numEmpleado='$d->claveempleado'";

                $sinc = DB::table('tblTarjetaUniformes')
                    ->where('numEmpleado', $d->claveempleado)
                    ->update([
                        'status' => 5,
                        'fechaTurno' => $fechaHora,
                    ]);
                if ($sinc) {
                    fwrite($archivo, "clave empleado = " . $d->claveempleado . ", fecha = '" . $fechaHora . "'" . PHP_EOL);
                }
            }

            DB::commit();
            echo "Todo ok";
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            echo "Ocurrió un error: " . $e;
        }


        fclose($archivo);
    }
}
