<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
<script src="librerias/alertifyjs/alertify.js"></script>
<?php
error_reporting(0);
include '../php/conexion.php';

require_once 'plugin/php-excel-reader/excel_reader2.php';
require_once 'plugin/SpreadsheetReader.php';

if(empty($_POST['import'])){
    header("Location:../home.php");
}

if (isset($_POST["import"])) {
    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        // is uploaded file
        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        // end is uploaded file
        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        for ($i = 0; $i < $sheetCount; $i++) {
            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row) {
                $brigadas = "";
                if (isset($Row[0])) {
                    $brigadas = mysqli_real_escape_string($conexion, $Row[0]);
                }

                $fecha = "";
                if (isset($Row[1])) {
                    $fecha = mysqli_real_escape_string($conexion, $Row[1]);
                }

                $lugar = "";
                if (isset($Row[2])) {
                    $lugar = mysqli_real_escape_string($conexion, $Row[2]);
                }

                $folio = "";
                if (isset($Row[3])) {
                    $folio = mysqli_real_escape_string($conexion, $Row[3]);
                }

                $horario = "";
                if (isset($Row[4])) {
                    $horario = mysqli_real_escape_string($conexion, $Row[4]);
                }

               if (!empty($brigadas) || !empty($fecha) || !empty($lugar) || !empty($folio) || !empty($horario)) {
                    $query = "INSERT INTO brigadas(Brigadas,Fecha,Lugar,Folio,Horario) VALUES(
                    '" . $brigadas . "',
                    '" . $fecha . "',
                    '" . $lugar . "',
                    '" . $folio . "',
                    '" . $horario . "'
                    )";

                    $result = mysqli_query($conexion, $query);

                    if ($result) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }

            }

        }
        header("Location:../home.php");
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }

}
