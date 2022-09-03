<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//read file
$inputFileName = 'test.xlsx';
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
echo $cellValue."<br><br>";
$dataArray = $spreadsheet->getActiveSheet()
    ->rangeToArray(
        'A1:B3',
        NULL,        
        TRUE,       
        TRUE,        
        TRUE         
    );
$j = json_encode($dataArray);
echo $j;
//write file
/*$spreadsheet->getActiveSheet()->setCellValue('A3', "testing");
//save
$writer = new Xlsx($spreadsheet);
$writer->save('test.xlsx');*/
?>