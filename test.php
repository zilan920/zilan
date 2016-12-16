<?php
$a = 110;
$m = "<100";
$n = ">100<=120";
$p = ">120<=150";
$q = ">150<=200";
$s = ">200";

static $last = 0;
foreach ($argv as $k => $arg){
    if($k != 0) {
        getstage($arg);
    }
}

function getstage($num){
    $stage1 = array("<=100", ">=100", "<=150", ">=150");
    $stage  = array(100, 150);
    $biggest = 150;
    if(!isset($num)){
    echo "number needed!";
    }
    static $last = 0;
    if($last != 0){
        $last = 0;
    }
    foreach ($stage as $s){
        if($num>$biggest){
            echo ("The num is ".$num."\n");
            echo ">  ".$biggest."\n";
            break;
        } else if ($num>$s) {
           $last = $s;
            continue;
        } else if ($num<=$s ) {
            echo ("The num is ".$num."\n");
            echo ($last.'   to   '.$s."\n");
            break;
        } 
    }   
}
