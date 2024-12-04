<!DOCTYPE html>
<html>

<head>
    <title>Comprobante Recepcion Uniformes FGJEM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style>
    /*
* Estilo para las tablas PDF
*/
    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th,
    td {
        /* padding: 0.0em; */
        padding: 1px;
    }

    .reporte,
    .encabezado {
        /*border-collapse:collapse;*/
        width: 100%;
    }

    s .headerformato {
        font-size: 10px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
        vertical-align: text-top;
    }


    .reporte th,
    td {
        font-size: 10px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .titulo_tr {
        /*background-color:#CDDCAE;*/
        text-align: left;
        font-size: 9px;
        border: 0.5px solid black
    }

    .titulo_td {
        text-align: left;
        font-size: 9px;
        border: 0.5px solid black;
        width: 50%;
        border-spacing: 0;
    }

    .lineamientos {
        text-align: justify;
        font-size: 8px;
        border: 0.5px solid black;
        width: 50%;
        padding: 10px;
    }

    .titulo_th {
        text-align: center;
        font-size: 9px;
        border: 0.5px solid black
    }

    .titulo2_th {
        background-color: #dddddd;
        text-align: center;
        font-size: 9px;
        border: 0.5px solid black;
        border-spacing: 0;
    }

    .titulo1_th {
        /*sdatos
        text-align: center;
        font-size: 12px;
        font-family: Arial, Helvetica, sans-serif;
        /* vertical-align: text-bottom;*/
    }

    .titulo1_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-right: 0.5px solid black;
    }

    .titulo2_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-left: 0.5px solid black;
    }

    .titulo4_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-bottom: 0.5px solid black;
        */
    }

    .titulo4r_td {
        text-align: right;
        font-family: Arial, Helvetica, sans-serif;
        border-bottom: 0.5px solid black;
        */
    }

    .titulo3_td {
        text-align: left;
        font-size: 10px;
        font-family: Arial, Helvetica, sans-serif;
        border-right: 0.5px solid black;
        border-bottom: 0.5px solid black;
        ;
    }

    .titulo5_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
    }

    .titulo5c_td {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
    }

    .titulo5r_td {
        text-align: right;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
    }

    .titulo6_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
        border-left: 0.5px solid black;
    }

    .titulo7_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        Laravel 8 PDF File Download using JQuery Ajax Request Example border-top: 00.5px solid black;
        border-left: 0.5px solid black;
        border-bottom: 00.5px solid black;
        border-right: 00.5px solid black;
        padding: 3px;
        border-spacing: 10px;
    }

    .titulo7r_td {
        text-align: right;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
        border-left: 0.5px solid black;
        border-bottom: 00.5px solid black;
        border-right: 00.5px solid black;
        padding: 3px;
        border-spacing: 10px;
    }

    .titulo7_td_ {
        text-align: left;
        background-color: lightgray;
        border-spacing: 10px;
    }

    .titulo8_td {
        text-align: left;
        font-size: 9px;
        font-family: Arial, Helvetica, sans-serif;
        border-left: 0.5px solid black;
        border-bottom: 0.5px solid black;
    }

    /*borde izquierda y derecha font-size 3px, utilizado para espacio entre lineas */
    .titulo9_td {
        text-align: left;
        font-size: 3px;
        font-family: Arial, Helvetica, sans-serif;
        border-left: 0.5px solid black;
        border-right: 0.5px solid black;
    }

    .titulo10_td {
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        border-top: 00.5px solid black;
        border-right: 0.5px solid black;
    }

    /* para borde inferior */
    .titulo11_td {
        text-align: left;
        font-size: 3px;
        font-family: Arial, Helvetica, sans-serif;
        border-left: 0.5px solid black;
        border-bottom: 0.5px solid black;
        border-right: 0.5px solid black;
    }

    .espacio {
        font-size: 3px;
    }


    .heading {
        /*#encabezado text-align: center;*/
        font-weight: bold;
        border: 0.5px solid black
    }

    .table_cont {
        text-align: center;
        border: 0.5px solid black;
        height: 15px;
    }

    .hid_tr {
        text-align: center;
        font-size: 7px;
    }

    .hid_tr_1 {
        text-align: center;
        font-size: 9px;
        border: 0.5px solid black;

    }

    .hid_td {
        text-align: center;
        font-size: 9px;
        height: 50px;
        border-left: 0.5px solid black;
    }

    .hid_td_1 {
        text-align: center;
        font-size: 9px;
        height: 50px;
        border-right: 0.5px solid black;
        border-left: 0.5px solid black;
        border-top: 0.5px solid black;
    }

    .hid_td_2 {
        text-align: center;
        font-size: 9px;
        height: 50px;
        border-right: 0.5px solid black;
    }

    .hid_td_3 {
        text-align: center;
        font-size: 9px;
        height: 50px;
        border-right: 0.5px solid black;
        border-left: 0.5px solid black;
    }

    .td_height {
        text-align: center;
        height: 80px;
        border: 0.5px solid black;
    }

    /*estilo con lineas*/
    h4 {
        text-align: center;
    }

    #container {
        width: 150px;
        height: 200px;
        border: 1px solid silver;
        position: relative;
    }

    #container2 {
        border: 1px solid silver;
        position: relative;
    }



    #container img {
        position: absolute;
        top: 50%;
        margin-top: -20;
    }

    .headt td {
        min-width: 235px;
        height: 100px;
    }

    /*
* fin estilo para tablas de PDF
*/

    @page {
        /*margin: 100px 80px;*/
        size: letter;
        margin-top: 2.5cm;
        margin-bottom: 2.0cm;
        margin-left: 3.0cm;
        margin-right: 2.0cm;
        padding: 0;
    }

    header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 30px;

        text-align: center;
        line-height: 35px;
    }

    footer {
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;
        font-family: Arial, Helvetica, sans-serif;

        /** Extra personal styles **/
        /*background-color: #03a9f4;
        color: white;
        */
        text-align: center;
        line-height: 35px;
    }

    body {

        background-position: center;
        background-repeat: no-repeat;
        background-size: 95%;
    }
</style>

<body>

    <header>

    </header>


    <main>
        <table>
            <tr>
                <td>
                    {{$direccion}}
                </td>
            </tr>
        </table>
        <table border="1">
            <thead>
                <tr align="center">
                    <th width="55%">NOMBRE</th>
                    <th width="30%">DIA</th>
                    <th width="15%">HORA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $d)
                    <tr>
                        <td width="55%">
                            {{ $d->nombre }}
                        </td>   
                        <td width="30%">
                           {{ $d->dia }}
                        </td>
                        <td width="15%">
                            {{ $d->hora }}
                         </td>                                          
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

</body>

</html>
