<?php
//API Merge v2
//Libraries
require 'vendor/autoload.php';
require '/source/BKVPlib.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$success = true;
//Check params
if(isset($_GET["key"]) && isset($_GET["mode"]) && isset($_GET["document"]) && isset($_GET["isMulti"]) && isset($_GET["requestType"])){
    //get request type, determine cell(s)
    if($_GET["requestType"] == "cell"){
        if(isset($_GET["cell"])){
            $cell = $_GET["cell"];
        }
        else{
            echo '{"success":false, "code":9110, "data":"Request type does not match data sent."';
            $success = false;
        }
    }
    else if($_GET["requestType"] == "named"){
        if(isset($_GET["row"]) && isset($_GET["column"])){
            
        }
        else{
            echo '{"success":false, "code":9110, "data":"Request type does not match data sent."';
            $success = false;
        }
    }
    else{
        echo '{"success":false, "code":9101, "data":"Invalid request type given."';
        $sucess = false;
    }
    if($sucess == true){
        //run part of the older API code
        if(is_dir($_GET["key"])){
            $key = $_GET["key"];
            $mode = $_GET["mode"];
            $document = $_GET["document"];
            $cell = $_GET["cell"];
            if($mode == "r"){
                //read
                //check if file exists under api key
                if(file_exists($key."/".$document)){
                    if($_GET["isMulti"] == "false"){
                        //single cell
                        $file = $key."/".$document;
                        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                        $value = $spreadsheet->getActiveSheet()->getCell($cell)->getValue();
                        echo '{"success": true, "code": 9104, "data": '.$value.'}';
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
                            echo '{"success": true, "data": '.$j.'}';
                        }
                        else{
                            echo '{"success": false, "code": 9105, "data": "Invalid cell range given."}';
                        }
                    }
                }
                else{
                    echo '{"success": false, "code": 9106, "data": "Document does not exist"}';
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
                        echo '{"success": true, "code": 9107, "data": "Success"}';
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
                                echo '{"success": false, "code": 9108, "data": "Invalid JSON"}';
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
                                echo '{"success": true, "code": 9107, "data": "Success"}';
                            }
                        }
                        else{
                            echo '{"success": false, "code": 9109, "data": "Data not set"}';
                        }
                    }
                }
                else{
                    echo '{"success": false, "data": "Document does not exist"}';
                }
            }
        }
        else{
            echo '{"success":false, "code":9103, "data":"Invalid key."';
        }
    }
}
else{
    echo '{"success":false, "code":9102, "data":"Missing parameter."';
}
?>