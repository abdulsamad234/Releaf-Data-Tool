<?php
  include('core/init.php');
  require('classes/Close.php');
  require_once('vendor/autoload.php');
  use League\Csv\Reader;
  use League\Csv\Writer;
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "GET"){
    if($_SESSION["analyst_logged_in"] == true){
      $_SESSION["conflict_number"] = 1;
      $offset = $_SESSION["conflict_number"];
      $conflict_reader = Reader::createFromPath("csv_files/conflicts.csv");
      $headers = $conflict_reader->fetchOne();
      $body = $conflict_reader->setOffset(1)->fetchAll();
      $first = $conflict_reader->setOffset($offset)->setLimit(2)->fetchAll();
      $_SESSION["total_conflicts"] = count($body) / 2;
      $renderer->renderView("eachConflictView", array("page"=>"resolve-conflicts", "title"=>"Resolve Conflicts", "conflict_headers"=>$headers, "conflict_counts"=>$_SESSION["total_conflicts"],
                              "conflict_number"=>$_SESSION["conflict_number"], "real_conflicts"=>$first));
    }
    else{
      Header("Location: index.php");
    }
  }
  else{

      $writer = Writer::createFromPath("csv_files/log.csv", "a+");
      $logArray = [];
      $logArray[0] = $_SESSION["analyst_name"];
      $logArray[1] = $_POST["organization_name"];
      if($_POST["to-commit"] == 1){
        $logArray[2] = "platform";
      }
      else{
        $logArray[2] = "input";
      }
      $writer->insertOne($logArray);
      $_SESSION["conflict_number"]++;
      $offset = ($_SESSION["conflict_number"] * 2) - 1;
      $conflict_reader = Reader::createFromPath("csv_files/conflicts.csv");
      $headers = $conflict_reader->fetchOne();
      $remaining = $conflict_reader->setOffset($offset)->setLimit(2)->fetchAll();
      if($_SESSION["conflict_number"] <= $_SESSION["total_conflicts"]){
        $renderer->renderView("eachConflictView", array("page"=>"resolve-conflicts", "title"=>"Resolve Conflicts", "conflict_headers"=>$headers, "conflict_counts"=>$_SESSION["total_conflicts"],
                              "conflict_number"=>$_SESSION["conflict_number"], "real_conflicts"=>$remaining));
      }
      else{
        Close::closeResolution();
      }
  }
?>
