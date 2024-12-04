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

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>
                    {{Session::get('nombre')}}
                </h4>
            </div>
            <div class="body">

                <form id="form_validation" action="{{ route('recepregistro') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-line col-md-3">
                            <label class="form-label">Clave de Servidor Público</label>

                            <select name="empleadorecep" id="empleadorecep" required>
                                <option value="">- - - Seleccione Clave o nombre del Servidor Público - - -</option>
                                @foreach($empsfull as $emp)
                                <option value="{{$emp->id}}">{{$emp->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h5>Unidad Administrativa</h5>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" maxlength="200" id="unidadadmactual" name="unidadadmactual" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group form-float">
                                <div>
                                    <input type="checkbox" id="noads" name="noads">
                                    <label for="noads">Adscripción Incorrecta</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class='form-line' id='tallas'>
                            <button type="submit" class="btn btn-link waves-effect" id="guardar2" title="Continuar">Registrar</button>
                            <button type="button" class="btn btn-link waves-effect" id="cancelar2" title="Limpiar Información">Limpiar</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop