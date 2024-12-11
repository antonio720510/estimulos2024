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
    
   
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>
                        {{Session::get('nombre')}}
                    </h4>
                    <table class="table">
                        <thead>
                            <th>Total Registros</th>
                        </thead>
                        <tbody>
                            <td>{{$est1[0]->total}}</td>
                        </tbody>
                    </table>
                </div>
                <div class="body">
                    <div id="divform1">
                        <div class="row">
                            <div id="datosgrales"></div>
                        </div>   
                        <div class="row">
                            <div class="col-md-4" align="right">
                                <label for="">Servidor Público</label>            
                            </div>
                            <div class="col-md-8">
                                <form action="{{route('recepcion1')}}" name="formRecepcion1" id="formRecepcion1" method="POST">
                                    {{ csrf_field() }}
                                    <select name="empleado" id="empleado" required>
                                        <option value="">- - - Seleccione Clave o nombre del Servidor Público - - -</option>
                                        @foreach($emps as $emp)
                                        <option value="{{$emp->numEmpleado}}" 
                                            {{-- data-idEmpleado = {{$emp->idEmpleado}} --}}
                                            data-numEmpleado={{$emp->numEmpleado}}
                                            {{-- data-paterno={{$emp->paterno}}
                                            data-materno={{$emp->materno}} --}}
                                            data-nombre={{$emp->nombre}}
                                            data-mesa='{{$emp->mesa}}'
                                            data-fechaHoraEntrega='{{$emp->fechaentrega}} {{$emp->horario}}'
                                            >
                                            {{-- {{ $emp->numEmpleado}} - {{$emp->paterno}} {{$emp->materno}} {{$emp->nombre}}  --}}
                                            {{ $emp->numEmpleado}} - {{$emp->nombre}}
                                        </option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="hidden" id="idEmpleado" name="idEmpleado" value=""> --}}
                                    <input type="hidden" id="paterno" name="paterno" value="">
                                    <input type="hidden" id="materno" name="materno" value="">
                                    <input type="hidden" id="nombre" name="nombre" value="">
                                    <input type="hidden" id="recepcion" name="recepcion" value="uno">
    
                                    <button type="submit" class="btn btn-success" name="btnRecep1" id="btnRecep1" title="Registrar Asistencia"
                                                style='font-size:12px' value="Comprobante">Registrar</button>

                                                <!-- Botón para restablecer -->
                                    <button type="reset" class="btn btn-secondary" id="btnReset" title="Restablecer" style="font-size: 12px; margin-left: 10px">
                                        Restablecer    
                                    </button>                                                
                                </form>
                            </div>                            
                        </div>
                        <div class="row fechaHora">
                            <div class="col-md-4" align="right">
                                <label for="">Fecha y Hora entrega</label>            
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="fechaHora" id="fechaHora" readonly class="form-control">
                            </div>
                        </div>
                        <div class="row mesa">
                            <div class="col-md-4" align="right">
                                <label for="">Mesa</label>            
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="mesa" id="mesa" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
