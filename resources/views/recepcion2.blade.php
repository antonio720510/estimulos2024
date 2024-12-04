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
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
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
                        {{ Session::get('nombre') }}
                    </h4>
                    <table class="table">
                        <thead><th>Registro Inicial</th><th>No Acepta Proceso</th><th>Acepta Proceso</th><th>Concluye Proceso</th><th>Total</th></thead>
                        <tbody><td>{{$est1[0]->total}}</td><td>{{$est2[0]->total}}</td>
                                <td>{{$est3[0]->total}}</td><td>{{$est4[0]->total}}</td><td>{{$est1[0]->total + $est2[0]->total + $est3[0]->total + $est4[0]->total}}</td>
                        </tbody>
                    </table>
                </div>
                <div class="body">
                    <div id="divform1">
                        <div class="row">
                            <div id="datosgrales2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" align="right">
                                <label for="">Servidor Público</label>
                            </div>
                            <div class="col-md-8">
                                <form action="{{ route('recep2') }}" name="formRecepcion2" id="formRecepcion2"
                                    method="POST">
                                    {{ csrf_field() }}
                                    <select name="empleado2" id="empleado2" required>
                                        <option value="">- - - Seleccione Clave o nombre del Servidor Público - - -
                                        </option>
                                        @foreach ($emps_recep2 as $emp)
                                            <option value="{{ $emp->numEmpleado }}" data-idEmpleado={{ $emp->idEmpleado }}
                                                data-numEmpleado={{ $emp->numEmpleado }} data-paterno={{ $emp->paterno }}
                                                data-materno={{ $emp->materno }} data-nombre={{ $emp->nombre }}>
                                                {{ $emp->numEmpleado }} - {{ $emp->paterno }} {{ $emp->materno }}
                                                {{ $emp->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="idEmpleado" name="idEmpleado" value="">
                                    <input type="hidden" id="paterno" name="paterno" value="">
                                    <input type="hidden" id="materno" name="materno" value="">
                                    <input type="hidden" id="nombre" name="nombre" value="">
                                    <input type="hidden" id="recepcion" name="recepcion" value="dos">
                                    <br><br><br>
                                    <button type="submit" class="btn btn-success" name="btnRecep2" id="btnRecep2"
                                        title="Continuar Proceso" style='font-size:12px' value="Comprobante">Continuar
                                        Proceso</button>

                                    <button type="submit" class="btn btn-info" name="btnNoAceptar" id="btnNoAceptar"
                                        value="1">
                                        Cancelar
                                    </button>

                                    <button type="button" class="btn btn-link" id="btnBackRecep2" name="btnBackRecep2">
                                        <a href="{{ route('showRecepcion2') }}">Regresar</a>
                                    </button>
                                </form>
                                {{-- <form action="{{ route('noAceptar') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="numEmpleado" name="numEmpleado" value="">
                                    <button type="submit" id="btnNoAceptar" name="btnNoAceptar" value="No Continuar">No continuar                                        
                                    </button>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
