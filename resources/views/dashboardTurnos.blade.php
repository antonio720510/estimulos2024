@extends('hometurnos')
@section('contenido')
    <script type="text/javascript">
        setTimeout(function() {
            location.reload(1);
        }, 7500);
    </script>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                {{-- <div class="header"> --}}
                    <h4>
                        <center>&nbsp;&nbsp;&nbsp;&nbsp;TURNOS &nbsp;&nbsp;&nbsp;En Proceso: {{ ($enproceso[0]->total - $concluidos[0]->total ) }} &nbsp;&nbsp;Concluidos: {{ $concluidos[0]->total }}</center>
                        {{-- {{ Session::get('nombre') }} --}}                        
                    </h4>                                     
                {{-- </div> --}}
                <div class="body">
                    <table class="table table-sm table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>TURNO</th>
                                {{-- <th>CLAVE EMPLEADO</th> --}}
                                <th>NOMBRE</th>
                                <th>MOVIMIENTO</th>
                                {{-- <th>FECHA y HORA</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turnos as $turno)
                                <tr>
                                    <td>{{ $turno->turno }}</td>
                                    {{-- <td>{{ $turno->numEmpleado }}</td> --}}
                                    <td>{{ $turno->nombre }}</td>
                                    <td align="center">
                                        @if ($turno->status == 1)
                                            <img src="public/images/banorte.jpeg" width="75">
                                        @elseif($turno->status == 2)
                                            <img src="public/images/documento.png" width="35">Documentación
                                        @elseif($turno->status == 3)
                                            @if ($turno->tipoPlaza == 'PDI' || $turno->tipoPlaza == 'TACTICO' || $turno->tipoPlaza == 'ESCOLTA' || $turno->tipoPlaza == 'SEGURIDAD INTERNA')
                                                <img src="public/images/pr77.jpeg" width="45"> &nbsp;&nbsp;&nbsp;   
                                                <img src="public/images/habers.jpg" width="65"> Uniforme(s)
                                            @elseif($turno->tipoPlaza =='AD' || $turno->tipoPlaza =='MP')
                                                <img src="public/images/habers.jpg" width="65"> Uniforme
                                            @elseif($turno->tipoPlaza =='SP')
                                            <img src="public/images/pr77.jpeg" width="45"> Uniforme
                                            @endif
                                        @elseif($turno->status == 5)
                                            <img src="public/images/concluido.png" width="25"> Proceso Concluido
                                        @endif
                                    </td>
                                    {{-- <td>{{ $turno->fechaRecepcion }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
