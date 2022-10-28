<?php
//APIv4 Debug
require 'vendor/autoload.php';
require '/source/BKVPlib.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
function readExcelCell($document, $cell){

}
function readExcelCellMulti($document, $cell){

}
function writeExcelCell($document, $cell, $data){

}
function writeExcelCellMulti($document, $cell, $data){

}
if(isset($_GET["key"]) && isset($_GET["mode"]) && isset($_GET["document"]) && isset($_GET["isMulti"])){
    if(is_dir($_GET["key"])){
        if(isset($_GET["row"]) && isset($_GET["column"])){
            if(file_exists("key/".$_GET["document"]) && file_exists("key/".explode(".", $_GET["document"])[0].".bkvp")){
                $bkvp = "key/".explode(".", $_GET["document"])[0].".bkvp";
                $cell = readBKVP($bkvp, $_GET["row"]).readBKVP($bkvp, $_GET["column"]);
                if($_GET["isMulti"] == true && $_GET["mode"] == "r"){
                    readExcelCell($_GET["document"], $cell);
                }
                else if($_GET["isMulti"] == false && $_GET["mode"] == "r"){
                    readExcelCellMulti($_GET["document"], $cell);
                }
                else if($_GET["isMulti"] == true && $_GET["mode"] == "w" && isset($_GET["data"])){
                    writeExcelCell($_GET["document"], $cell, $data);
                }
                else if($_GET["isMulti"] == false && $_GET["mode"] == "w" && isset($_GET["data"])){
                    writeExcelCellMulti($_GET["document"], $cell, $data);
                }
                else{
                    echo '{"success": false, "data": "Error 9203 isMulti and mode wrong"}'; 
                }
            }
        }
        else if(isset($_GET["cell"])){
            if(file_exists("key/".$_GET["document"])){
                $cell = $_GET["cell"];

            }
        }
        else{
            echo '{"success": false, "data": "Error 9202 Missing cell, or row/column"}';
        }
    }
    else{
        echo '{"success": false, "data": "Error 9200 Invalid key"}';
    }
}
else{
    echo '{"success": false, "data": "Error 9201 Missing parameters"}';
}
?>