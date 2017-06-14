<?php
  class Render{
    public function renderView($viewName, $args = array()){
      include('args.php');
      include('includes/header.php');
      include('views/'.$viewName.'.php');
      include('includes/footer.php');
    }
  }
?>
