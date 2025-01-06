<?php
    require_once 'include.php';
    session_destroy();
    header('Location: index.php');
?>