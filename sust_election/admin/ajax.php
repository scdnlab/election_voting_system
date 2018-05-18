<?php
    include("../includes/configure.php");
    $array=array(0=>'suhag',1=>'sumon',3=>'hasan');
    $string=array2json($array);
    echo $string;

?>
