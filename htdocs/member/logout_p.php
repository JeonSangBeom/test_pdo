<?php
include  $_SERVER['DOCUMENT_ROOT']."/pdo.php"; 

session_start();
session_destroy();

header('Location: ../index.php');
?>