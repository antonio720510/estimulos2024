<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FGJEM - Estímulos</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('public/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{ asset('public/plugins/node-waves/waves.css') }}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('public/plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <!-- Colorpicker Css -->
    <link href="{{ asset('public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="{{ asset('public/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <!-- Multi Select Css -->
    <link href="{{ asset('public/plugins/multi-select/css/multi-select.css') }}" rel="stylesheet">
    <!-- Bootstrap Spinner Css -->
    <link href="{{ asset('public/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet">
    <!-- Bootstrap datePicker Css -->
    <link href="{{ asset('public/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ asset('public/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <!-- <link href="{{ asset('public/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" /> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- noUISlider Css -->

    <link href="{{ asset('public/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">•••

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('public/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
        rel="stylesheet">

    <!-- DataTables para exportar excell, pdf -->
    <link href="{{ asset('public/DataTables/Buttons-2.2.2/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/DataTables/datatables.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        // funcion que valida que se acepten una cantidad especifica de enteros
        function maxDigit(evt, digitosActual, maximoDigitos) {
            if (digitosActual == maximoDigitos)
                return false;
            if (isNumber(evt))
                return true;

            return false;
        }
        // funcion que valida que el caracter capturado es un digito o no
        function isNumber(evt, digitosActual, maxDigitos) {
            var charCode = (evt.which) ? evt.which : event.keyCode

            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espera por favor...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
            <link href="{{ asset('public/plugins/jquery-spinner/css/bootstrap-datepicker.css') }}" rel="stylesheet">
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand">FGJEM - Estímulos</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="{{ route('cerrar_sesion') }}" class="navbar-brand"
                            data-close="true">CIERRE DE SESIÓN</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    {{-- <img src="{{ asset('public/images/user-img-background.png') }}" width="60" height="60" /> --}}
                    <img src="{{asset('images/LOGO FGJEM 2024-h66px.jpg')}}"  height="60"/>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            {{-- Rol admin --}}
            @if (Session('id_rol') == '1')
                <div class="menu">
                    <ul class="list">

                        <li>
                            <a href="{{ route('home') }}" class="menu-toggle">
                                <i class="material-icons">perm_media</i>
                                <span>Inicio</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">perm_media</i>
                                <span>Reportes</span>
                            </a>
                            <ul class="ml-menu">
                                {{-- <li>
                                    <a href="{{ route('reporteRegistros') }}">Reporte General</a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('reporteEstimulos') }}">Reporte por Dia</a>
                                </li>
                            </ul>                           
                        </li>

                        {{-- <li>
                            <link href="{{ asset('public/plugins/jquery-spinner/css/bootstrap-datepicker.css') }}"
                                rel="stylesheet">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">perm_media</i>
                                <span>Empleado</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{ route('somatometria.create') }}">Agregar Nuevo</a>
                                </li>
                                <li>
                                    <a href="{{ route('showNoAcepta') }}">Reactivar</a>
                                </li>
                            </ul>
                        </li>                        
                        --}}

                    </ul>
                    <!-- #Menu -->
                </div>
            @endif
        </aside>
        <!-- #END# Left Sidebar -->
        <section class="content">
            <div class="container-fluid">
                <!-- #BEGIN# Input Slider -->
                @yield('contenido')
                <!-- #END# Input Slider -->
            </div>
        </section>
        <script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap Core Js -->
        <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.js') }}"></script>
        <!-- Select Plugin Js -->
        <!-- <script src="{{ asset('public/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script> -->
        <!-- Slimscroll Plugin Js -->
        <script src="{{ asset('public/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <!-- Bootstrap Colorpicker Js -->
        <script src="{{ asset('public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
        <!-- Bootstrap datePicker Css -->
        <script src="{{ asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <!-- Dropzone Plugin Js -->
        <script src="{{ asset('public/plugins/dropzone/dropzone.js') }}"></script>
        <!-- Input Mask Plugin Js -->
        <script src="{{ asset('public/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
        <!-- Multi Select Plugin Js -->
        <script src="{{ asset('public/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
        <!-- Jquery Spinner Plugin Js -->
        <script src="{{ asset('public/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>
        <!-- Bootstrap Tags Input Plugin Js -->
        <script src="{{ asset('public/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
        <!-- noUISlider Plugin Js -->
        <script src="{{ asset('public/plugins/nouislider/nouislider.js') }}"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="{{ asset('public/plugins/node-waves/waves.js') }}"></script>

        <!-- DataTables -->
        <script src="{{ asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/bower_components/datatables.net-bs/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

        <!-- Datatables con botones excel, pdf -->
        <script src="{{ asset('public/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('public/DataTables/Buttons-2.2.2/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('public/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
        <script src="{{ asset('public/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
        <script src="{{ asset('public/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
        <script src="{{ asset('public/DataTables/Buttons-2.2.2/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('public/DataTables/Buttons-2.2.2/js/buttons.print.min.js') }}"></script>

        <!-- Custom Js -->
        <script src="{{ asset('public/js/admin.js') }}"></script>

        <script src="{{ asset('public/js/pages/tables/jquery-datatable.js') }}"></script>
        <!-- Demo Js -->
        <script src="{{ asset('public/js/demo.js') }}"></script>

        <!-- Select2 -->
        <script src="{{ asset('bower_components/select2/dist/js/select2.js') }}"></script>

        <script type="text/javascript">
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                startDate: '-3d'
            });

            $(".table2").DataTable({
                // order: [[3, 'asc']],
                dom: 'Bfrtip',
                searching: true,
                paging: true,
                buttons: [
                    'excel',
                ],
                "language": {

                    "sSearch": "Buscar:",
                    "sEmptyTable": "No Hay Datos en la Tabla",
                    "sZeroRecords": "No se encoccruzgarntraron resultados",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un _TOTAL_",
                    "sInfoEmpty": "Mostrando registros de 0 al 0 de un total de 0",
                    "sInfoFiltered": "(Filtrando de un total de _MAX_ registros)",
                    "oPaginate": {

                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior",
                    },

                    "sLoadingRecords": "Cargando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",

                },
            });

            $(".table").DataTable({
                // order: [[4, 'desc']],
                dom: 'Bfrtip',
                searching: false,
                paging: false,
                buttons: [
                    //'excel',
                ],
                "language": {

                    "sSearch": "Buscar:",
                    "sEmptyTable": "No Hay Datos en la Tabla",
                    "sZeroRecords": "No se encoccruzgarntraron resultados",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un _TOTAL_",
                    "sInfoEmpty": "Mostrando registros de 0 al 0 de un total de 0",
                    "sInfoFiltered": "(Filtrando de un total de _MAX_ registros)",
                    "oPaginate": {

                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior",
                    },

                    "sLoadingRecords": "Cargando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",

                },

            });

            $("#empleado").select2();
            $("#empleado2").select2();
            $("#empleado3").select2();
            $("#selectReactivar").select2();

            $(document).ready(function($) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(".mesa").hide();
                $(".fechaHora").hide();
                $("#btnRecep1").hide();
                $("#btnRecep2").hide();
                $("#btnReset").hide();
                $("#btnNoAceptar").hide();
                $("#btnBackRecep2").hide();
                $("#btnBackRecep3").hide();
                $("#btnRecep3").hide();
                $("#btnReactivar").hide();
                $("#divFolio").hide();
                $("#btnlimpiar").hide(); // Ocultar botón limpiar
                $("#btnComprobante").hide(); // Ocultar botón Imprimir comprobante
                // $("#btnlimpiar").show();
                $("#servpub").focus(); // Fija el foco
                $("#btnComprob").hide(); // Boton Imprimir comprobante

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                // Evento que detecta la captura de la clave del empleado
                $('#servpub').on('change', function() {
                    idEmp = $('#servpub').val();
                    //$('#hservpub').val(idEmp);
                    document.getElementById("hcvepub").value = idEmp;
                    $("#datosgrales").text("");

                    $.ajax({
                        url: 'getInfoServPub',
                        type: 'POST',
                        data: {
                            idEmp: idEmp
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            $("#btnlimpiar").show();
                            if (response.status == 2) {
                                $("#datosgrales").append(response.html);
                                $("#btnComprob").show();
                            } else if (response.status == 1) {
                                $("#datosgrales").append(response.html);
                            } else if (response.status == 0) {
                                $("#datosgrales").append(
                                    '<div class="alert alert-warning" role="alert">Sin Información</div>'
                                );
                            }
                        }
                    });
                });

                // Recepcion 1
                $('#empleado').on('change', function(e) {                    
                    e.preventDefault();
                    idEmp = $('#empleado').val();
                    $("#datosgrales").text("");
                    $.ajax({
                        url: 'datosemp',
                        type: 'POST',
                        data: {
                            idEmp: idEmp,
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            $("#datosgrales").append(response.html);
                            $("#nombre").val($("#empleado option:selected").data('nombre'));
                            $("#paterno").val($("#empleado option:selected").data('paterno'));
                            $("#materno").val($("#empleado option:selected").data('materno'));
                            $("#idEmpleado").val($("#empleado option:selected").data('idempleado'));
                            $("#btnRecep1").show();
                            $("#btnReset").show();
                            $("#mesa").val($("#empleado option:selected").data('mesa'));
                            $("#fechaHora").val($("#empleado option:selected").data('fechahoraentrega'));
                            $(".mesa").show();
                            $(".fechaHora").show();
                        }
                    });
                });

                // Recepcion 2
                $('#empleado2').on('change', function(e) {
                    e.preventDefault();
                    let idEmp = $('#empleado2').val();
                    $("#datosgrales2").text("");
                    $.ajax({
                        url: 'datosemp2',
                        type: 'POST',
                        data: {
                            idEmp: idEmp,
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            $("#datosgrales2").append(response.html);
                            $("#nombre").val($("#empleado2 option:selected").data('nombre'));
                            $("#paterno").val($("#empleado2 option:selected").data('paterno'));
                            $("#materno").val($("#empleado2 option:selected").data('materno'));
                            $("#idEmpleado").val($("#empleado2 option:selected").data(
                                'idempleado'));
                            $("#numEmpleado").val(idEmp);
                            $("#btnRecep2").show();
                            $("#btnNoAceptar").show();
                            $("#btnBackRecep2").show();
                        }
                    });
                });

                // Recepcion 3
                $('#empleado3').on('change', function(e) {
                    e.preventDefault();
                    idEmp = $('#empleado3').val();
                    $("#datosgrales3").text("");
                    $.ajax({
                        url: 'datosemp3',
                        type: 'POST',
                        data: {
                            idEmp: idEmp,
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            $("#datosgrales3").append(response.html);
                            $("#divFolio").show();
                            $("#btnBackRecep3").show();
                            $("#btnRecep3").show();
                        }
                    });
                });

                // Reactivar Empleado
                $('#selectReactivar').on('change', function(e) {
                    e.preventDefault();
                    idEmp = $('#selectReactivar').val();
                    $("#datosgrales3").text("");
                    $.ajax({
                        url: 'datosemp3',
                        type: 'POST',
                        data: {
                            idEmp: idEmp,
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            $("#datosgrales3").append(response.html);
                            $("#divFolio").show();
                            $("#btnBackRecep3").show();
                            $("#btnReactivar").show();
                            //$("#btnRecep3").show();
                        }
                    });
                });

                $('#btnReset').click(function() {
                     
                     location.reload();
                                    
                });
                


            });


            function limpiar() {
                $("#btnlimpiar").hide();
                //$("#btnComprob").hide();
                $("#btnRecep1").hide();
                $("#datosgrales").text("");
                $("#servpub").val('');
                $("#servpub").focus();
                $('#btnReset').hide();
            }

            // function NoAceptar()
            // {
            //     let numEmpleado = $("#numEmpleado").val();
            //     $.post('')                
            // }

            const digits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];

            function isNumericString(numericString) {
                return digits.indexOf(numericString) === -1 ? false : true;
            }

            function isValidNumber(numericString) {

                let isValid = false;

                for (let i = 0; i < numericString.length; i++) {
                    if (!isNumericString(numericString[i])) return isValid;
                }

                isValid = Number.isNaN(parseFloat(numericString)) ? false : true;
                return isValid;
            }

            function validaFolio() {

                let folio = document.getElementById("folio").value;
                if (folio.length < 8) {
                    alert("Folio erroneo, deben ser 8 dígitos");
                }
                if (!isValidNumber(folio)) {
                    alert("Verifique el folio, deben ser 8 dígitos");
                }
                if(folio < 31000000 || folio > 32999999){
                    alert("Folio Erroneo, formato: (31XXXXXX ó 32XXXXXX)")
                }

                $.ajax({
                    url: 'chkFolio',
                    type: 'POST',
                    data: {
                        folio: folio,
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.encontrado) {
                            //$("#btnRecep3").hide();
                            if (response.msg == "")
                                alert("¡El Folio: " + folio + ", ya existe, verifique!");
                            else
                                alert(response.msg);
                        } else {
                            //$("#btnRecep3").show();
                        }
                    }
                });
            }

            function comprobante() {
                if ($('#servpub').val() != "") {
                    $.post('comprobantepdf', {
                        idEmp: idEmp
                    }, function(data) {
                        $("#datosgrales").append(data);
                        $("#btnlimpiar").show();
                        $("#btnComprobante").show();
                    });
                }
            }

            function mayus(e) {
                e.value = e.value.toUpperCase();
            }

            function valideKey(evt) {

                // code is the decimal ASCII representation of the pressed key.
                var code = (evt.which) ? evt.which : evt.keyCode;

                if (code == 8) { // backspace.
                    return true;
                } else if (code >= 48 && code <= 57) { // is a number.
                    return true;
                } else { // other keys.
                    return false;
                }
            }
        </script>
</body>

</html>
