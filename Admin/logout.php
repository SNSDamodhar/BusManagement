<?php
    session_start();

    if (isset($_SESSION['admin'])) {

        unset($_SESSION['admin']);
        header("location:../index.html");

    } else {
        header("location:../index.html");
    }
?>