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
                    <div class="row">
                        <div id="datosgrales3"></div>
                    </div>
                    <div id="divform1">

                        <div class="row">
                            <div class="col-md-4" align="right">
                                {{-- <label for="">Clave Servidor Público</label> --}}
                            </div>
                            <div class="col-md-8">
                                <form action="{{ route('recep3') }}" name="formRecepcion3" id="formRecepcion3"
                                    method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label col-form-label-sm">Clave
                                            Servidor Público</label>
                                        <div class="col-sm-8">
                                            <select name="empleado3" id="empleado3" required
                                                class="form-control form-control-sm">
                                                <option value="">- - - Seleccione Clave o nombre del Servidor Público
                                                    - - -
                                                </option>
                                                @foreach ($emps_recep3 as $emp)
                                                    <option value="{{ $emp->numEmpleado }}"
                                                        data-idEmpleado = {{$emp->idEmpleado}}
                                                        data-numEmpleado={{$emp->numEmpleado}}
                                                        data-paterno={{$emp->paterno}}
                                                        data-materno={{$emp->materno}}
                                                        data-nombre={{$emp->nombre}}
                                                        >
                                                        {{ $emp->numEmpleado }} - {{ $emp->paterno }} {{ $emp->materno }}
                                                        {{ $emp->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row" id="divFolio">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Folio</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="folio" id="folio" class="form-control-sm" pattern="^32\d{6}$" placeholder="Formato: 32XXXXXX" 
                                            {{-- onkeypress="return valideKey(event);" onblur="validaFolio()" --}}
                                            maxlength="8"  required>
                                            {{-- @if ($errors->has('folio'))
                                                <span class="text-danger">{{ $errors->first('folio') }}</span>
                                            @endif --}}
                                            <small style="color: red"> (32XXXXXX) </small>
                                        </div>
                                    </div>

                                    <input type="hidden" id="idEmpleado" name="idEmpleado" value="">
                                    <input type="hidden" id="paterno" name="paterno" value="">
                                    <input type="hidden" id="materno" name="materno" value="">
                                    <input type="hidden" id="nombre" name="nombre" value="">
                                    <input type="hidden" id="recepcion" name="recepcion" value="dos">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success" name="btnRecep3" id="btnRecep3"
                                                title="Finalizar Proceso" style='font-size:12px' value="Comprobante"
                                                class="form-control form-control-sm">
                                                Finalizar Proceso
                                            </button>
                                            <button type="button" class="btn btn-link" id="btnBackRecep3" name="btnBackRecep3"><a href="{{ route('showRecepcion3') }}">Regresar</a></button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
