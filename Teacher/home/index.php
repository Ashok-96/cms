<?php

session_start();

date_default_timezone_set('asia/kolkata');

$timestamp = date("Y-m-d H:i:s");

if(isset($_SESSION['teacher'])){
  header('Location:./index.html');
}else{
  header('Location:../index.php');

}
