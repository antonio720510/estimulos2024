@extends('home')
@section('contenido')


    <div class="card">
        <div class="header">
            <h4>
                {{ Session::get('nombre') }}
            </h4>
            <h3>Agregar nuevo usuario</h3>
        </div>
        <div class="body">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif
            <form action="{{ route('guardaNuevoEmp')}}" method="POST" name="frmNuevoEmpleado" id="frmNuevoEmpleado">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nombre">* Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}"
                        placeholder="Nombre" maxlength="50" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="paterno">* Paterno</label>
                        <input type="text" class="form-control" name="paterno" id="paterno" value="{{ old('paterno') }}"
                        placeholder="Paterno" maxlength="50" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="materno">* Materno</label>
                        <input type="text" class="form-control" name="materno" id="materno" value="{{ old('materno') }}"
                        placeholder="materno" maxlength="50" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="idEmpleado">Id Empleado</label>
                        <input type="text" class="form-control" name="idEmpleado" id="idEmpleado"  value="{{ old('idEmpleado') }}"
                        maxlength="4" placeholder="idEmpleado">
                        @if ($errors->has('idEmpleado'))
                            <span class="text-danger">{{ $errors->first('idEmpleado') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="numEmpleado">* Número de Empleado/CURP</label>
                        <input type="text" class="form-control" name="numEmpleado" id="numEmpleado" value="{{ old('numEmpleado') }}"
                        placeholder="numEmpleado" maxlength="20" required>
                        @if ($errors->has('numEmpleado'))
                        <span class="text-danger">{{ $errors->first('numEmpleado') }}</span>
                    @endif
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="correoinstitucional"> Correo Institucional</label>
                        <input type="email" class="form-control" id="correoinstitucional" name="correoinstitucional" value="{{ old('correoinstitucional') }}"
                            placeholder="correoinstitucional" maxlength="50" >
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="fechaNacimiento"> Fecha Nacimiento</label>
                        <input name="fechaNacimiento" id="fechaNacimiento" class="datepicker form-control" value="{{ old('fechaNacimiento') }}"
                        data-date-format="mm/dd/yyyy" placeholder="dd/mm/yyyy" maxlength="10" >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="sexo">* Sexo</label>
                        <select name="sexo" id="sexo" class="form-control" required>
                            <option value="">- Sexo -</option>
                            <option value="FEMENINO">FEMENINO</option>
                            <option value="MASCULINO">MASCULINO</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="telefono">* Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}"
                        placeholder="telefono" maxlength="50" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="adscripcionFisica">* Adscripción Física</label>
                        <input type="text" class="form-control" name="adscripcionFisica" id="adscripcionFisica" value="{{ old('adscripcionFisica') }}"
                        maxlength="150" placeholder="adscripcionFisica"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="adscripcionNominal"> Adscripcion Nominal</label>
                        <input type="text" class="form-control" name="adscripcionNominal" id="adscripcionNominal" value="{{ old('adscripcionNominal') }}"
                        maxlength="150" placeholder="adscripcionNominal"
                        >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="puestoLaboral">* Puesto Laboral</label>
                        <input type="text" class="form-control" name="puestoLaboral" id="puestoLaboral" value="{{ old('puestoLaboral') }}"
                        maxlength="150" placeholder="puestoLaboral" 
                        required>
                    </div>

                </div>
                
                <button class="btn btn-primary" type="submit">Guardar</button>
                
            </form>
        </div>
    </div>


@stop
