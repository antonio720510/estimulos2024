@extends('home')
@section('contenido')
    <script type="text/javascript">
        setTimeout(function() {
            location.reload(1);
        }, 7500);
    </script>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>
                        <img src="public/images/pr77.jpeg" width="150">
                      {{-- {{ Session::get('nombre') }} --}}
                    </h4>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>TURNO</th>
                                <th>CLAVE EMPLEADO</th>
                                <th>NOMBRE</th>                               
                                <th>FECHA y HORA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turnosPR77 as $turno)
                                <tr>
                                    <td>{{ $turno->turno }}</td>
                                    <td>{{ $turno->numEmpleado }}</td>
                                    <td>{{ $turno->nombre }}</td>                                    
                                    <td>{{ $turno->fechaRecepcion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
