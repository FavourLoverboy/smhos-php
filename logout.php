<?php
    // Logout
    session_start();
    if($_SESSION['level']){
        session_destroy();
        header('location: leaders');
    }else{
        session_destroy();
        header('location: leaders');
    }
?>