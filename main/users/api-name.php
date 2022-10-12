<?php
//excelwebdatabases api
//import lib
require 'vendor/autoload.php';
require '/source/BKVPlib.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//check if correct parameters are set
if(isset($_GET["key"]) && isset($_GET["mode"]) && isset($_GET["document"]) && isset($_GET["isMulti"]) && isset($_GET["row"]) && isset($_GET["column"])){
    if(is_dir($_GET["key"])){
        //set variables
        $key = $_GET["key"];
        $mode = $_GET["mode"];
        $document = $_GET["document"];
        $row = $_GET["row"];
        $column = $_GET["column"];
        $rowN = readBKVP("$key/$document.bkvp", $row);
        $columnN = readBKVP("$key/$document.bkvp", $column);
        $cell = $column.$row;
        if($mode == "r"){
            //read
            //check if file exists under api key
            if(file_exists($key."/".$document)){
                if($_GET["isMulti"] == "false"){
                    //single cell
                    $file = $key."/".$document;
                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                    $value = $spreadsheet->getActiveSheet()->getCell($cell)->getValue();
                    echo '["success": true, "data": '.$value.']';
                }
                else{
                    //multi cell
                    if(strpos($cell, ":") !== false){
                        $file = $key."/".$document;
                        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                        $dataArray = $spreadsheet->getActiveSheet()
                        ->rangeToArray(
                            $cell,
                            NULL,        
                            TRUE,       
                            TRUE,        
                            TRUE         
                        );
                        $j = json_encode($dataArray);
                        echo "{'success': true, 'data': $j}";
                    }
                    else{
                        echo '{"success": false, "data": "Invalid cell range given"}';
                    }
                }
            }
            else{
                echo '{"success": false, "data": "Document does not exist"}';
            }
        }
        else if($mode == "w"){
            //write
            //check if file exists under api key
            if(file_exists($key."/".$document) && isset($_GET["data"])){
                $data = $_GET["data"];
                if($_GET["isMulti"] == "false"){
                    //single cell
                    $file = $key."/".$document;
                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                    $spreadsheet->getActiveSheet()->setCellValue($cell, $data);
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($key."/".$document);
                    echo '{"success": true, "data": "Success"}';
                }
                else{
                    //multi cell
                    if(isset($_GET["data"])){
                        $file = $key."/".$document;
                        try{
                            $array = json_decode($_GET["data"]);
                            $success = true;
                        }
                        catch(Exception $e){
                            echo '{"success": false, "data": "Invalid JSON"}';
                            $success = false;
                        }
                        if($success == true){
                            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                            $spreadsheet->getActiveSheet()->fromArray(
                            $array,  
                            NULL,      
                            $cell       
                            );
                            $writer = new Xlsx($spreadsheet);
                            $writer->save($key."/".$document);
                            echo '{"success": true, "data": "Success"}';
                        }
                    }
                    else{
                        echo '{"success": false, "data": "Data not set"}';
                    }
                }
            }
            else{
                echo '{"success": false, "data": "Document does not exist"}';
            }
        }
    }
    else{
        echo '{"success": false, "data": "API Key does not exist"}';
    }
}
?>