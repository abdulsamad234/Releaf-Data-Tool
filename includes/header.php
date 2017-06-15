<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Releaf | <?php echo $argv["title"];?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href ="css/style.css" rel = "stylesheet">
    <link href = "fonts/glyphicons-halfings-regular.ttf" rel = "stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class = "container-fluid" id = "bodyy">
    <?php if($argv["page"] != "home"):?>
    <div class = "dropdown">
      <button class = "btn btn-default dropdown-toggle" type = "button" id = "dropDownMenu" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded = "false"><strong>Navigate </strong><span class = "caret"></span>
      </button>
      <ul class = "dropdown-menu" aria-labelledby="dropdownMenu">
        <li><a href = "index.php">Homepage</a></li>
        <li><a href = "new.php">New</a></li>
        <li role = "separator" class = "divider"></li>
        <li><a href = "resolve-conflicts.php">Resolve Conflicts</a></li>
      </ul>
    </div>
  <?php endif;?>
