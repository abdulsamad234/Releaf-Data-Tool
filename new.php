<?php
  include('core/init.php');
  include('classes/DB.php');
  require_once('vendor/autoload.php');
  use League\Csv\Reader;
  use League\Csv\Writer;
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $renderer->renderView('newEntryView', array("page" => "new", "title" => "Add New Entry"));
  }
  else if($_SERVER["REQUEST_METHOD"] == "POST"){
    $target_dir = "csv_files/inputs/";
    $total = count($_FILES["inputs"]["name"]);
    $outcsv = Reader::createFromPath('csv_files/merged.csv');
    $outheaders = $outcsv->fetchOne();
    $outres = $outcsv->setOffset(1)->fetchAll();
    $upload_errors = "";
    for($i = 0; $i < $total; $i++){
      if($_FILES["inputs"]["type"][$i] != "text/csv"){
        $upload_errors .= "File with name ".$_FILES["input"]["name"][$i]." is of an invalid type! <br/>";
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
        foreach($inrest as $inbody){
          if($outres != null){
            foreach($outbody as $out){
              if(in_array($inbody[0], $out)){
                $row++;
              }
            }
          }
            $outbody[$row] = $inbody;
            $row++;
        }
        $writer = Writer::createFromPath('csv_files/merged.csv', 'w+');
        $writer->insertOne($outheaders);
        $writer->insertAll($outbody);
      }
    }
  }
?>
