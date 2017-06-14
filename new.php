<?php
  include('core/init.php');
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $renderer->renderView('newEntryView', array("page" => "new", "title" => "Add New Entry"));
  }
  else if($_SERVER["REQUEST_METHOD"] == "POST"){
    $target_dir = "csv_files/inputs/";
    $total = count($_FILES["input"]["name"]);
    $upload_errors = "";
    for($i = 0; $i < $total; $i++){
      if($_FILES["input"]["type"][$i] != "text/csv"){
        $upload_errors .= "File with name ".$_FILES["input"]["name"][$i]." is of an invalid type! <br/>";
      }
      else{
        $tmpFilePath = $_FILES['input']["tmp_name"][$i];
        $file = fopen($tmpFilePath, "r");
        $outputFile = fopen("csv_files/merged.csv", "r");
        while(!feof($outputFile)){
          $outputArray[] = fgetcsv($file);
        }
        while(!feof($file)){
          $temp = fgetcsv($file);
          print_r($temp);
          echo "<br>";
        }
        fclose($file);
        fclose($outputFile);
      }
    }
  }
?>
