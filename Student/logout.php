<?php
    session_start();

    if (isset($_SESSION['student'])) {

        unset($_SESSION['student']);
        header("location:../index.html");

    } else {
        header("location:../index.html");
    }
?>