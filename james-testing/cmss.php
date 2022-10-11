<?php
//CoMpactStorageSystem (CMSS) file reader
if(isset($_GET["r"]) && isset($_GET["file"])){
    if(file_exists($_GET["file"])){
        $c = file_get_contents($_GET["file"]);
        if(strpos($c, "cmss1/") !== false){
            $c = substr($c, 6);
            $c = explode("*", $c);
            $n = count($c);
            $section = explode(".", $_GET["r"])[0];
            $item = explode(".", $_GET["r"])[1];
            for($i = 0; $i < $n; $i++){
                if(strpos($c[$i], $section."(") !== false){
                    $repl = str_replace($section."(", "", $c[$i]);
                    $repl = str_replace(")", "", $repl);
                    $repl = explode("~", $repl);
                    $co = count($repl);
                    for($k = 0; $k < $co; $k++){
                        if(strpos($repl[$k], $item) !== false){
                            $main = $repl[$k];
                            $main = explode("=", $main);
                            $data = $main[1];
                            echo $data;
                        }
                    }
                }
            }
        }
        else if(strpos($c, "cmss1s/") !== false){
            $c = substr($c, 7);
            $c = explode("~",$c);
            $n = count($c);
            for($i = 0; $i < $n; $i++){
                if(strpos($c[$i], $_GET["r"]) !== false){
                    $sp = explode("=", $c[$i]);
                    $data = $sp[1];
                    echo $data;
                }
            }
        }
        else{
            echo "Not valid CMSS file.";
        }
    }
}
?>