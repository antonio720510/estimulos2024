<!DOCTYPE html>
<html>

<head>
    <title>Comprobante Recepcion Uniformes FGJEM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
@inject('mifun', 'App\Http\Controllers\UniformeController')
<style>
    /*
* Estilo para las tablas PDF
*/
    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th,
    td {
        /* padding: 0.0em; */
        padding: 1px;
    }

    .reporte,
    .encabezado {
        /*border-collapse:collapse;*/
        width: 100%;
    }

    s .headerformato {
        font-size: 10px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
        vertical-align: text-top;
    }


    .reporte th,
    td {
        font-size: 10px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .titulo_tr {
        /*background-color:#CDDCAE;*/
        text-align: left;
        font-size: 9px;
        border: 0.5px solid black
    }

    .titulo_td {
        text-align: left;
        font-size: 9px;
        border: 0.5px solid black;
        width: 50%;
        border-spacing: 0;
    }

    .lineamientos {
        text-align: justify;
        font-size: 8px;
        border: 0.5px solid black;
        width: 50%;
        padding: 10px;
    }

    .titulo_th {
        text-align: center;
        font-size: 9px;
        border: 0.5px solid black
    }

    .titulo2_th {
        background-color: #dddddd;
        text-align: center;
        font-size: 9px;
        border: 0.5px solid black;
        border-spacing: 0;
    }

    .titulo1_th {
        /*sdatos
        text-align: center;
        font-size: 12px;
        font-family: Arial, Helvetica, sans-serif;
        /* vertical-align: text-bottom;*/
    }

    .titulo1_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-right: 0.5px solid black;
    }

    .titulo2_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-left: 0.5px solid black;
    }

    .titulo4_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-bottom: 0.5px solid black;
        */
    }

    .titulo4r_td {
        text-align: right;
        font-family: Arial, Helvetica, sans-serif;
        border-bottom: 0.5px solid black;
        */
    }

    .titulo3_td {
        text-align: left;
        font-size: 10px;
        font-family: Arial, Helvetica, sans-serif;
        border-right: 0.5px solid black;
        border-bottom: 0.5px solid black;
        ;
    }

    .titulo5_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
    }

    .titulo5c_td {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
    }

    .titulo5r_td {
        text-align: right;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
    }

    .titulo6_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
        border-left: 0.5px solid black;
    }

    .titulo7_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        Laravel 8 PDF File Download using JQuery Ajax Request Example border-top: 00.5px solid black;
        border-left: 0.5px solid black;
        border-bottom: 00.5px solid black;
        border-right: 00.5px solid black;
        padding: 3px;
        border-spacing: 10px;
    }

    .titulo7r_td {
        text-align: right;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
        border-left: 0.5px solid black;
        border-bottom: 00.5px solid black;
        border-right: 00.5px solid black;
        padding: 3px;
        border-spacing: 10px;
    }

    .titulo7_td_ {
        text-align: left;
        background-color: lightgray;
        border-spacing: 10px;
    }

    .titulo8_td {
        text-align: left;
        font-size: 9px;
        font-family: Arial, Helvetica, sans-serif;
        border-left: 0.5px solid black;
        border-bottom: 0.5px solid black;
    }

    /*borde izquierda y derecha font-size 3px, utilizado para espacio entre lineas */
    .titulo9_td {
        text-align: left;
        font-size: 3px;
        font-family: Arial, Helvetica, sans-serif;
        border-left: 0.5px solid black;
        border-right: 0.5px solid black;
    }

    .titulo10_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
        border-right: 0.5px solid black;
    }

    /* para borde inferior */
    .titulo11_td {
        text-align: left;
        font-size: 3px;
        font-family: Arial, Helvetica, sans-serif;
        border-left: 0.5px solid black;
        border-bottom: 0.5px solid black;
        border-right: 0.5px solid black;
    }

    .espacio {
        font-size: 3px;
    }


    .heading {
        /*#encabezado text-align: center;*/
        font-weight: bold;
        border: 0.5px solid black
    }

    .table_cont {
        text-align: center;
        border: 0.5px solid black;
        height: 15px;
    }

    .hid_tr {
        text-align: center;
        font-size: 7px;
    }

    .hid_tr_1 {
        text-align: center;
        font-size: 9px;
        border: 0.5px solid black;

    }

    .hid_td {
        text-align: center;
        font-size: 9px;
        height: 50px;
        border-left: 0.5px solid black;
    }

    .hid_td_1 {
        text-align: center;
        font-size: 9px;
        height: 50px;
        border-right: 0.5px solid black;
        border-left: 0.5px solid black;
        border-top: 0.5px solid black;
    }

    .hid_td_2 {
        text-align: center;
        font-size: 9px;
        height: 50px;
        border-right: 0.5px solid black;
    }

    .hid_td_3 {
        text-align: center;
        font-size: 9px;
        height: 50px;
        border-right: 0.5px solid black;
        border-left: 0.5px solid black;
    }

    .td_height {
        text-align: center;
        height: 80px;
        border: 0.5px solid black;
    }

    /*estilo con lineas*/
    h4 {
        text-align: center;
    }

    #container {
        width: 150px;
        height: 200px;
        border: 1px solid silver;
        position: relative;
    }

    #container2 {
        border: 1px solid silver;
        position: relative;
    }



    #container img {
        position: absolute;
        top: 50%;
        margin-top: -20;
    }

    .headt td {
        min-width: 235px;
        height: 100px;
    }

    /*
* fin estilo para tablas de PDF
*/

    @page {
        /*margin: 100px 80px;*/
        size: letter;
        margin-top: 2.5cm;
        margin-bottom: 2.0cm;
        margin-left: 3.0cm;
        margin-right: 2.0cm;
        padding: 0;
    }

    header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 30px;

        text-align: center;
        line-height: 35px;
    }

    footer {
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;
        font-family: Arial, Helvetica, sans-serif;

        /** Extra personal styles **/
        /*background-color: #03a9f4;
        color: white;
        */
        text-align: center;
        line-height: 35px;
    }

    body {

        background-position: center;
        background-repeat: no-repeat;
        background-size: 95%;
    }
</style>

<body>

    <header>
        <table width="100%">
            <tr>
                <td align="left" class="titulo4r_td">
                    <h3>TURNO:</h3>
                </td>
                <td class="titulo4r_td">&nbsp;</td>
                <td align="right" class="titulo4r_td">
                    <h3>NÚM. CONSEC.: {{ $consec }} </h3>
                </td>
            </tr>
            {{-- <tr><td colspan="3" class="titulo4_td">&nbsp;</td></tr> --}}
            <tr>
                <td width="30%" class="titulo4_td">
                    <img src="{{ public_path('images/edomex.jpg') }}" height="50px" />
                </td>
                <td width="50%" align="center" class="titulo4r_td"></td>
                <td width="20%" align="right" class="titulo4r_td">
                    <img src="{{ public_path('images/fiscalia.jpg') }}" height="50px" />
                </td>
            </tr>
        </table>
    </header>


    <main>

        {{-- <div class="container2 col-md-12"> --}}

            <div class="col-md-12 section">
                <table>
                    <tr align="right">
                        <th>SEDE: {{ $sede }}, {{ $dia }}{{-- <?php echo date('d-m-Y'); ?> --}}</th>
                    </tr>
                    <tr align="right">
                        <td>
                            <h3>HORA: {{ $hora }}</h3>
                        </td>
                    </tr>
                    <tr align="center">
                        <th><b>COMPROBANTE DE RECEPCIÓN DE UNIFORME/TARJETA BANORTE</b></th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td width="25%"><img src="{{ $urlfoto }}" width="70px"></td>
                        <td style="font-size: 10px" width="75%">
                            <b>NOMBRE:</b> {{ $emp->paterno . ' ' . $emp->materno . ' ' . $emp->nombre }} <br>
                            <b>CLAVE SERVIDOR PÚBLICO:</b> {{ $emp->numEmpleado }} <br>
                            <b>PUESTO LABORAL:</b> {{ $emp->desPuestoLaboral }} <br>
                            <b>ADSCRIPCIÓN ACTUAL:</b> {{ $emp->adscripcionActual }} <br>
                            <b>UNIDAD ADM.:</b> {{ $unidad }} <br>
                            <b>ESTATUS:</b> {{ $emp->activo == 'S' ? 'ACTIVO' : $emp->activo }}
                        </td>
                    </tr>
                </table>
            </div>
        {{-- </div><!-- Container --> --}}

        {{-- <div class="container-md"> --}}
            <div class="col-md-2">

                @if ($tarjeta == 'SI')
                    <table border="1">
                        <thead>
                            <tr style="background-color: darkgray" align="CENTER">
                                <th style="font-size: 10px"><b>TARJETA BANORTE</b></th>
                            </tr>
                            <tr align="CENTER">
                                <th colspan="2" style="height: 25px"></th>
                            </tr>
                            <tr align="center">
                                <td colspan="2">RECIBÍ (Nombre y Firma)</td>
                            </tr>
                        </thead>
                    </table>
                @endif

                @if ($uniformes)
                    @foreach ($uniformes as $uniforme)
                        @if(
                            ($sp == "1" &&  $uniforme->tipouniforme == "CAMPO") ||
                            ($admin == "1" && $uniforme->tipouniforme == "ADMINISTRATIVO") ||
                            ($mp == "1" && $uniforme->tipouniforme == "ADMINISTRATIVO MP") ||
                            ($pdi == "1" && ($uniforme->tipouniforme == "CAMPO" || $uniforme->tipouniforme == "EJECUTIVO PDI")) ||
                            ($tactico == "1" && ($uniforme->tipouniforme == "CAMPO" || $uniforme->tipouniforme == "ADMINISTRATIVO" || $uniforme->tipouniforme == "TACTICO")) 
                            )
                        <table border="1">
                            <thead>
                                <tr align="center" style="background-color: darkgray">
                                    <th scope="col" style="font-size: 10px" colspan="2">
                                        <center><b>UNIFORME {{ $uniforme->tipouniforme }}</b></center>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" style="font-size: 10px">(CANTIDAD) PRENDA</th>
                                    <th scope="col" style="font-size: 10px">TALLA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prendas as $prenda)
                                    @if ($uniforme->id == $prenda->uniformeempleado_id)
                                        @if ($prenda->tipoprenda == 'GUANTES' && $uniforme->tipouniforme == 'CAMPO' && $tipoPlaza == 'SP')
                                        @elseif($prenda->tipoprenda == 'CHALECO' && $uniforme->tipouniforme == 'EJECUTIVO PDI' && $tipoPlaza == 'PDI')
                                        @else
                                            <tr>
                                                <td style="font-size: 10px;">({{$mifun->cantidad($prenda->tipoprenda, $uniforme->tipouniforme)}}) {{ $prenda->tipoprenda }} </td>
                                                <td style="font-size: 10px;">{{ $prenda->talla }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach

                                @if ($uniforme->tipouniforme == 'ADMINISTRATIVO' || $uniforme->tipouniforme == 'ADMINISTRATIVO MP')
                                    @if($genero == 'M')
                                    <tr>
                                        <td style="font-size: 10px;">(4) CORBATINES Y (1) MASCADA</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    @endif
                                    @if($genero == 'H')
                                    <tr>
                                        <td style="font-size: 10px;">(5) CORBATAS</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    @endif
                                @endif

                                @if ($uniforme->tipouniforme == 'EJECUTIVO PDI')
                                    @if($genero == 'M')
                                    <tr>
                                        <td style="font-size: 10px;">(4) CORBATINES</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    @endif
                                    @if($genero == 'H')
                                    <tr>
                                        <td style="font-size: 10px;">(5) CORBATAS</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    @endif
                                @endif

                                @if ($uniforme->tipouniforme == 'CAMPO')
                                    @if ($tipoPlaza == 'SP')
                                        <tr>
                                            <td style="font-size: 10px;">(1) GORRA</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) LENTES SENCILLO</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) CHAMARRA INV.</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) CHAMARRA RV</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td style="font-size: 10px;">(1) LENTES</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) HOLSTER/PORTACARGADOR</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) BOLSA</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) CHAMARRA INVERNAL</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) CHAMARRA ROMPE VIENTOS</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) PASHMINA</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 10px;">(1) GORRA</td>
                                            <td style="font-size: 10px;">UNITALLA</td>
                                        </tr>
                                    @endif
                                @endif

                                @if ($uniforme->tipouniforme == 'TACTICO')
                                    <tr>
                                        <td style="font-size: 10px;">(1) MOCHILA</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) RODILLERAS</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) PASHMINA</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) LENTES INTERCAMBIABLES</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) PORTA FUSIL</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) CHALECO PORTA PLACAS</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(2) PORTA CARGADOR ARMA LARGA</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) PORTA RADIO</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) PLACAS BALISTICAS</td>
                                        <td style="font-size: 10px;">-</td>
                                    </tr>
                                @endif

                                <tr align="CENTER">
                                    <th colspan="2" style="height: 25px"></th>
                                </tr>
                                <tr align="center">
                                    <td colspan="2">RECIBÍ (Nombre y Firma)</td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    @endforeach
                @else
                    @if ($admin == 1)
                        <table border="1">
                            <thead>
                                <tr align="center" style="background-color: darkgray">
                                    <th scope="col" style="font-size: 10px" colspan="2">
                                        <center><b>UNIFORME ADMINISTRATIVO (Sin registro de tomas de tallas)</b>
                                        </center>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" style="font-size: 10px">(CANTIDAD) PRENDA</th>
                                    <th scope="col" style="font-size: 10px">TALLA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-size: 10px;">(2) PANTALON</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(4) CAMISA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(2) SACO</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                @if($genero == 'M')
                                <tr>
                                    <td style="font-size: 10px;">(4) CORBATINES Y (1) MASCADA</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                @endif
                                @if($genero == 'H')
                                <tr>
                                    <td style="font-size: 10px;">(5) CORBATAS</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                @endif
                                <tr align="CENTER">
                                    <th colspan="2" style="height: 25px"></th>
                                </tr>
                                <tr align="center">
                                    <td colspan="2">RECIBÍ (Nombre y Firma)</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                    @if ($campo == 1)
                        <table border="1">
                            <thead>
                                <tr align="center" style="background-color: darkgray">
                                    <th scope="col" style="font-size: 10px" colspan="2">
                                        <center><b>UNIFORME CAMPO (Sin registro de tomas de tallas)</b></center>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" style="font-size: 10px">(CANTIDAD) PRENDA</th>
                                    <th scope="col" style="font-size: 10px">TALLA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-size: 10px;">(1) CAMISOLA OPERATIVA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(2) PANTALON PIE TIERRA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) BOTA TACTICA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) CINTURON</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) PLAYERA TIPO POLO</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) GUANTES</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                @if ($tipoPlaza == 'SP')
                                    <tr>
                                        <td style="font-size: 10px;">(1) GORRA</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) LENTES SENCILLO</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) CHAMARRA INVERNAL</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) CHAMARRA ROMPE VIENTOS</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="font-size: 10px;">(1) LENTES</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) HOLSTER/PORTACARGADOR</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) BOLSA</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) CHAMARRA INVERNAL</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) CHAMARRA ROMPE VIENTOS</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) PASHMINA</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 10px;">(1) GORRA</td>
                                        <td style="font-size: 10px;">UNITALLA</td>
                                    </tr>
                                @endif
                                <tr align="CENTER">
                                    <th colspan="2" style="height: 25px"></th>
                                </tr>
                                <tr align="center">
                                    <td colspan="2">RECIBÍ (Nombre y Firma)</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                    @if ($tactico == 1)
                        <table border="1">
                            <thead>
                                <tr align="center" style="background-color: darkgray">
                                    <th scope="col" style="font-size: 10px" colspan="2">
                                        <center><b>UNIFORME CAMPO (Sin registro de tomas de tallas)</b></center>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" style="font-size: 10px">(CANTIDAD) PRENDA</th>
                                    <th scope="col" style="font-size: 10px">TALLA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-size: 10px;">(1) CAMISOLA TACTICA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(2) PANTALON TACTICO</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) BOTA TACTICA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) CINTURON TACTICO</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) PLAYERA RAPIDA</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) GUANTES TACTICOS</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) CASCO FAST</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) MOCHILA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) RODILLERAS</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) PASHMINA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) LENTES INTERCAMBIABLES</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) PORTA FUSIL</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) CHALECO PORTA PLACAS</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(2) PORTA CARGADOR ARMA LARGA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) PORTA RADIO</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(1) PLACAS BALISTICAS</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr align="CENTER">
                                    <th colspan="2" style="height: 25px"></th>
                                </tr>
                                <tr align="center">
                                    <td colspan="2">RECIBÍ (Nombre y Firma)</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                    @if ($pdi == 1)
                        <table border="1">
                            <thead>
                                <tr align="center" style="background-color: darkgray">
                                    <th scope="col" style="font-size: 10px" colspan="2">
                                        <center><b>UNIFORME EJECUTIVO PDI (Sin registro de tomas de tallas)</b></center>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" style="font-size: 10px">(CANTIDAD) PRENDA</th>
                                    <th scope="col" style="font-size: 10px">TALLA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-size: 10px;">(2) PANTALON</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(4) CAMISA</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">(2) SACO</td>
                                    <td style="font-size: 10px;">-</td>
                                </tr>
                                @if($genero == 'M')
                                <tr>
                                    <td style="font-size: 10px;">(4) CORBATINES Y (1) MASCADA</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                @endif
                                @if($genero == 'H')
                                <tr>
                                    <td style="font-size: 10px;">(5) CORBATAS</td>
                                    <td style="font-size: 10px;">UNITALLA</td>
                                </tr>
                                @endif
                                <tr align="CENTER">
                                    <th colspan="2" style="height: 25px"></th>
                                </tr>
                                <tr align="center">
                                    <td colspan="2">RECIBÍ (Nombre y Firma)</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                @endif

                @if ($uniformes || ($admin == 1 || $campo == 1 || $tactico == 1 || $pdi == 1))
                <table border="1">
                    <tr align="CENTER">
                        <th colspan="2" style="height: 25px"></th>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><b>Recibí Pin y lineamientos para la portación, uso y conservación de los uniformes ejecutivos y operativo de la Fiscalía General de Justicia del Estado de México.&nbsp;&nbsp;(Nombre y Firma)</b></td>
                    </tr>
                </table>
                @endif
            </div>
        {{-- </div> --}}

    </main>

</body>

</html>
