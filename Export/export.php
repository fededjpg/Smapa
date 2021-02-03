<?php
//call the autoload
require "Database.php";
require 'Metodos.php';
require 'vendor/autoload.php';
//load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//call iofactory instead of xlsx writer
use PhpOffice\PhpSpreadsheet\IOFactory;
//phpspreadsheet Date class
use PhpOffice\PhpSpreadsheet\Shared\Date;
//phpspreadsheet numberformat style class
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
//rich text class
use \PhpOffice\PhpSpreadsheet\RichText\RichText;
//phpspreadsheet style color
use \PhpOffice\PhpSpreadsheet\Style\Color;

//make a new spreadsheet object
$spreadsheet = new Spreadsheet();
//get current active sheet (first sheet)
$sheet = $spreadsheet->getActiveSheet();

 $sheet->setTitle("Brigadas");

    $sheet->setCellValue('A1', 'Brigadas');
    $sheet->setCellValue('B1', 'Fecha');
    $sheet->setCellValue('C1', 'Lugar');
    $sheet->setCellValue('D1', 'Folio');
    $sheet->setCellValue('E1', 'Horario');

    $metodos = new Metodos();
    $objDatos = $metodos->obtenerBrigadas();

    $i = 2;

    foreach ($objDatos as $datos) {
        $Brigadas = $datos["Brigadas"];
        $Fecha = $datos["Fecha"];
        $Lugar = $datos["Lugar"];
        $Folio = $datos["Folio"];
        $Horario = $datos["Horario"];

        $sheet->setCellValue('A' . $i, $Brigadas);
        $sheet->setCellValue('B' . $i, $Fecha);
        $sheet->setCellValue('C' . $i, $Lugar);
        $sheet->setCellValue('D' . $i, $Folio);
        $sheet->setCellValue('E' . $i, $Horario);

        $i++;
    }

//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="result.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');

?>
