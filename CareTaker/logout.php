<?php
    session_start();

    if (isset($_SESSION['caretaker'])) {

        unset($_SESSION['caretaker']);
        header("location:../index.html");

    } else {
        header("location:../index.html");
    }
?>