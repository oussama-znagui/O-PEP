<?php
session_start();
include 'config.php';
if($_SESSION['status'] != 'admin'){
  header("Location: index.php");
}
?>