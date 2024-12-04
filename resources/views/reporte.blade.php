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
                                Empleados con Uniformes Entregados/No Entregados
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Clave Empleado</th>                                            
                                            <th>Nombre Empleado</th>
                                            <th>Tipo Plaza</th>
                                            <th>Adscripcion Actual</th>                                                                                                                                
                                            <th>Fecha Entrega</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Clave Empleado</th>                                            
                                            <th>Nombre Empleado</th>
                                            <th>Tipo Plaza</th>
                                            <th>Adscripcion Actual</th>                                                                                                                                  
                                            <th>Fecha Entrega</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($datos as $d)                                        
                                        <tr>                                            
                                            <td>{{$d->clave}}</td>
                                            <td>{{$d->nombre}}</td>
                                            <td>{{$d->plaza}}</td>
                                            <td>{{$d->adscripcion}}</td>                                           
                                            <td>{{$d->fecharecepcion}}</td>
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