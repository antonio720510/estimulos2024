@extends('home')
@section('contenido')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('errorrfc'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('errorcp'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('errorclabe'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>
                    {{Session::get('nombre')}}
                </h4>
            </div>
            <div class="body">
                <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Reporte de Registros del periodo: {{$fecha1}} a {{ $fecha2}}
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Registros Iniciales</th>
                                        <th>Registros No Acepta</th>
                                        <th>Registros Acepta</th>
                                        <th>Registros Concluidos</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$est1[0]->total}}</td>
                                        <td>{{$est2[0]->total}}</td> 
                                        <td>{{$est3[0]->total}}</td>
                                        <td>{{$est4[0]->total}}</td>
                                        <td>{{$est1[0]->total + $est2[0]->total + $est3[0]->total+ $est4[0]->total}}</td>
                                    </tr>
                                </tbody>                            
                            </table>
                            <br>
                            <div class="table-responsive">
                                <table class="table2 table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr> 
                                            <th>Id Empleado</th>                                           
                                            <th>Numero Empleado</th>
                                            <th>Nombre</th>
                                            <th>Fecha registro inicial</th>
                                            <th>Fecha Aceptación/No Aceptación</th>
                                            <th>Fecha Conclusión</th>
                                            <th>Estatus</th>
                                            <th>Folio</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>  
                                            <th>Id Empleado</th>                                           
                                            <th>Numero Empleado</th>
                                            <th>Nombre</th>
                                            <th>Fecha registro inicial</th>
                                            <th>Fecha Aceptación/No Aceptación</th>
                                            <th>Fecha Conclusión</th>
                                            <th>Estatus</th>
                                            <th>Folio</th>                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($datos as $d)                                        
                                        <tr>  
                                            <td>{{$d->idEmpleado}}</td>                                          
                                            <td>{{$d->numEmpleado}}</td>
                                            <td>{{$d->paterno}} {{$d->materno}} {{$d->nombre}}</td>
                                            <td>{{$d->fecha}}</td>
                                            <td>{{$d->fecha2}}</td>
                                            <td>{{$d->fecha3}}</td>
                                            <td>{{$d->estatus}}</td>
                                            <td>{{$d->folio}}</td>
                                        </tr>
                                        @endforeach                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->               
            </div>
        </div>
    </div>
</div>
@stop