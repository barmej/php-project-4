<?php 
include_once "./classes/Database.php";
include_once "./classes/Report.php";
$database=new Database();
  $search=$database->allReportes();
  if(isset($_GET["report"])){
      $search=$search[$_GET["report"]];
  }

  ?>