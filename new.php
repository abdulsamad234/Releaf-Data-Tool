<?php
  include('core/init.php');
  require_once('vendor/autoload.php');
  use League\Csv\Reader;
  use League\Csv\Writer;
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $renderer->renderView('newEntryView', array("page" => "new", "title" => "Add New Entry","success"=>false, "errors"=>""));
  }
  else if($_SERVER["REQUEST_METHOD"] == "POST"){
    $target_dir = "csv_files/inputs/";
    $total = count($_FILES["inputs"]["name"]);
    $outcsv = Reader::createFromPath('csv_files/merged.csv');
    $outheaders = $outcsv->fetchOne();
    $outres = $outcsv->setOffset(1)->fetchAll();
    $upload_errors = "";
    $success = true;
    for($i = 0; $i < $total; $i++){
      if($_FILES["inputs"]["type"][$i] != "text/csv"){
        $upload_errors .= "File with name ".$_FILES["inputs"]["name"][$i]." is of an invalid type! <br/>";
        $success = false;
      }
      else{
        $tmpFilePath = $_FILES['inputs']["tmp_name"][$i];
        $incsv = Reader::createFromPath($tmpFilePath);
        $inheaders = $incsv->fetchOne();
        $inrest = $incsv->setOffset(1)->fetchAll();
        $row = 0;
        foreach($inheaders as $inheader){
          if(!in_array($inheader, $outheaders)){
            $outheaders[$row] = $inheader;
          }
          $row++;
        }
        if($outres != null){
          $outbody = $outres;
          $row = count($outres);
        }
        else{
          $row = 0;
        }
        $conflict = false;
        $conflictsArray = [];
        $conflictsArrayIndex = 0;
        foreach($inrest as $inbody){
          if($outres != null){
            foreach($outbody as $out){
              if(strcasecmp($inbody[0],$out[0]) == 0){
                $conflict = true;
                $conflictsArray[$conflictsArrayIndex][0] = $_FILES["inputs"]["name"][$i];
                $conflictsArray[$conflictsArrayIndex][1] = $inbody[0];
                $conflictsArray[$conflictsArrayIndex+1][0] = "csv_files/merged.csv";
                $conflictsArray[$conflictsArrayIndex+1][1] = $out[0];
                $conflictsArrayIndex+=2;
                $upload_errors .= "Field \"".$inbody[0]."\" in file \"".$_FILES["inputs"]["name"][$i]."\" already exists in the platform!<br>";
                $success = false;
                break;
              }
              $conflict = false;
            }
          }
          if($conflict != true){
            $outbody[$row] = $inbody;
            $row++;
          }
        }
        $conflictsWriter = Writer::createFromPath('csv_files/conflicts.csv', 'a+');
        $conflictsWriter->insertAll($conflictsArray);
        $writer = Writer::createFromPath('csv_files/merged.csv', 'w+');
        $writer->insertOne($outheaders);
        $writer->insertAll($outbody);
      }
    }
    $renderer->renderView('newEntryView', array("page" => "new", "title" => "Add New Entry", "errors"=>$upload_errors, "success" => $success));
  }
?>
