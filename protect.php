<?php
function protect() {
    if(!isset($_SESSION)) {
        session_start();
    }
    
    if(!isset($_SESSION['usuarioID']) || !is_numeric($_SESSION['usuarioID'])) {
        header("Location: login.php");
        exit;
    }
}
?>