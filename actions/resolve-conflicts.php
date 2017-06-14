<?php
  session_start();
  if($_POST["analyst_name"] != ""){
    $_SESSION["analyst_logged_in"] = true;
    $_SESSION["analyst_name"] = $_POST["analyst_name"];
  }
?>
