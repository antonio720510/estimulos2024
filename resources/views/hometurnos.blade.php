<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FGJEM - Entrega Uniformes</title>
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
                <a class="navbar-brand"> FGJEM - Uniformes</a>
                <img src="public/images/fiscalia.jpg" width="50">
            </div>
            {{-- <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="{{ route('cerrar_sesion') }}" class="navbar-brand"
                            data-close="true">CIERRE DE SESIÓN</a></li>
                </ul>
            </div> --}}
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>

        <!-- #END# Left Sidebar -->
        <section class="contentturnos">
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
            $(".table").DataTable({
                order: [
                    [4, 'desc']
                ],
                dom: 'Bfrtip',
                searching: false,
                paging: true,
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
        </script>
</body>

</html>
