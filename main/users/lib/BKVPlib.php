<?php
//BKVP data storage format library (c)2022
function readBKVP($doc, $key){
    if(file_exists($doc)){
        $parts = explode($key.":", file_get_contents($doc));
        $value = explode("|", $parts[1])[0];
        return $value;
    }
    else{
        return "404";
    }
}
function writeBKVP($doc, $key, $value, $isNewValue){
    if(file_exists($doc)){
        $file = file_get_contents($doc);
        if($isNewValue == true){
            $put = $file."|".$key.":".$value;
            file_put_contents($doc, $put);
            return "Success.";
        }
        else{
            $parts = explode($key.":", file_get_contents($doc));
            $beforePart = $parts[0];
            $middlePartOne = $key.":";
            $endPartTogether = "";
            $endPart = explode("|", $parts[1]);
            for($i = 1; $i < count($endPart); $i++){
                $endPartTogether = $endPartTogether.$endPart[$i];
            }
            $middlePartTwo = $value."|";
            file_put_contents($doc, $beforePart.$middlePartOne.$middlePartTwo.$endPartTogether);
            return "Success.";
        }
    }
}
function checkLib(){
    return "Working.";
}
?>