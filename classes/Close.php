<?php
require_once('vendor/autoload.php');
use League\Csv\Reader;
use League\Csv\Writer;
class Close{
  public function closeResolution(){
    $offset = 1;
    $limit = $_SESSION["total_conflicts"] * 2;
    $writer = Writer::createFromPath("csv_files/conflicts.csv", "w+");
    $writer->setOffset($offset)->setLimit($limit)->insertOne(Array());
    Header("Location: index.php");
  }
}
?>
