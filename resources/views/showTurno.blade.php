@extends('home')
@section('contenido')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>
                    {{Session::get('nombre')}}
                </h4>
            </div>
            <div class="body">

                <div id="divform1">
                    <h1>TURNO: {{$numTurno}}</h1>
                    <form action="showRecepcion1" method="get">
                        <input type="submit" name="btnRecepcion1" id="btnRecepcion1" value=" Regresar al Listado" class="btn btn-primary btn-lg">                                               
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

@stop

