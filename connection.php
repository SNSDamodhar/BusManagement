<?php

    $lhname="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="busmanagement";

    $con = mysqli_connect($lhname,$dbuser,$dbpass,$dbname);

    if( !$con ) {
        die('Could not Connect');
    }

    //echo 'Connection Success!';
?>
