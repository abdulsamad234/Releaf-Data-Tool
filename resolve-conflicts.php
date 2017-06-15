<?php
  include('core/init.php');
  if($_SERVER["REQUEST_METHOD"] == "GET"){
    $renderer->renderView("resolveConflictsView", array("page"=>"resolve-conflicts", "title"=>"Resolve Conflicts"));
  }
?>
