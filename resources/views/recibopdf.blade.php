<!DOCTYPE html>
<html>

<head>
    <title>Comprobante Recepcion Uniformes FGJEM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <header>
        <table width="100%">
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

    <footer>
        <table>
            <tr>
                <td class="titulo5_td" width="40%">COMPROBANTE DE RECEPCIÓN DE UNIFORMES</td>
                <td class="titulo5c_td" width="45%">Fiscalía General de Justicia del Estado de México</td>
            </tr>
        </table>
    </footer>

    <main>

        <div class="container2 col-md-12">

            <div class="col-md-12 section">
                <div class="panel panel-primary">
                    <div class="panel-heading" align="center">
                        <p>SEDE: {{ $emp->sede }}  FECHA: {{ $emp->dia }}</p>
                    </div>
                    <div align="center">
                        <h6>COMPROBANTE DE RECEPCIÓN DE UNIFORME</h6>
                    </div>
                    <br>
                    <div class="panel-body">

                        <div class="row">
                            <table>
                                <tr>
                                    <td width="25%"><img src="{{ $urlfoto }}" width="125px"></td>
                                    <td style="font-size: 11px" width="75%">
                                        <p><b>{{ $emp->banorte }} </b></p>
                                        <p><b>NOMBRE:</b>{{ $emp->nombre }} </p>
                                        <p><b>CLAVE SERVIDOR PÚBLICO:</b> {{ $emp->numEmpleado }} </p>
                                        <p><b>PUESTO LABORAL:</b> {{ $emp->unidadAdm }} </p>
                                        <p><b>ADSCRIPCIÓN ACTUAL:</b> {{ $emp->puesto }} </p>
                                        <p><b>ESTATUS:</b> {{ $emp->activo }} </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div><!-- Container -->

        <div class="container-md">
            @foreach ($uniformes as $uniforme)
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">UNIFORME {{ $uniforme->tipouniforme }}</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Prenda</th>
                                        <th scope="col">Talla</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prendas as $prenda)
                                        @if ($uniforme->id == $prenda->uniformeempleado_id)
                                            <tr>
                                                <td>{{ $prenda->tipoprenda }}</td>
                                                <td>{{ $prenda->talla }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <br><br><br>
        <div class="row">
            <table>
                <tr><td width="30%"></td><td width="40%" align="center"><hr></td><td width="30%"></td></tr>
                <tr><td></td><td align="center" style="font-size: 11px">RECIBÍ UNIFORME</td><td></td></tr>
                <tr><td></td><td align="center" style="font-size: 11px">NOMBRE Y FIRMA</td><td></td></tr>
981700
