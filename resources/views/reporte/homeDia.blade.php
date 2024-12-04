@extends('home')
@section('contenido')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h3>Reporte por periodos</h3>
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
                                <form action="{{ route('reportePeriodo') }}" name="formreportePeriodo" id="formreportePeriodo"
                                    method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label col-form-label-sm">Periodo:</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="fecha1" id="fecha1"> 
                                            - <input type="date" name="fecha2" id="fecha2">
                                            <button type="submit" class="btn btn-success">Aceptar</button>
                                        </div>                                       
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label col-form-label-sm"></label>
                                        <div class="col-sm-8">
                                            <button type="button" class="btn btn-success">Aceptar</button>
                                        </div>
                                    </div> --}}

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
