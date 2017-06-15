<div class = "container-fluid" id = "body-main-solve">
  <div class = "well">
    <div class = "top">
      <div class = "float-left">
        <h1>Resolve Conflicts</h1>
        <h3>Conflict No: <?php echo $argv["conflict_number"];?> of <?php echo $argv["conflict_counts"];?></h3>
      </div>
      <div class = "float-right">
        <a href = "close.php" id = "exit-button-link"><div id = "exit-button">x</div></a>
      </div>
      <div class = "clear"></div>
    </div>
    <hr/>
    <div class = "body-solve">
      <form method = "post" action = "each_conflict.php">
        <div class = "float-left">
          <input type = "radio" name = "to-commit" value = "1" class = "radio-btn">
          <div class = "platform">
            <p> &nbsp; On the platform:</p>
            <div class = "well table-well">
              <table class = "table">
                <thead>
                  <?php foreach($argv["conflict_headers"] as $header):?>
                    <th><?php echo $header?></th>
                  <?php endforeach;?>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach($argv["real_conflicts"][1] as $out):?>
                      <td><?php echo $out;?></td>
                    <?php endforeach;?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <input type = "radio" name = "to-commit" value = "2" class = "radio-btn">
          <div class = "input">
            <p> &nbsp; From the input file:</p>
            <div class = "well table-well">
              <table class = "table">
                <thead>
                  <?php foreach($argv["conflict_headers"] as $header):?>
                    <th><?php echo $header?></th>
                  <?php endforeach;?>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach($argv["real_conflicts"][0] as $out):?>
                      <td><?php echo $out;?></td>
                    <?php endforeach;?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <input type = "hidden" name = "organization_name" value = "<?php echo $argv['real_conflicts'][0][1];?>">
        <div class = "float-right">
          <button class = "btn confirm-button">Confirm -></button>
        </div>
        <div class = "clear"></div>
      </form>
    </div>
  </div>
</div>
