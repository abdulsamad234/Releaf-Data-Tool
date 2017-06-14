<?php
$data = $_POST["data"];
?>
<div class = "container-fluid" id = "body-main-solve">
  <div class = "well">
    <div class = "top">
      <div class = "float-left">
        <h1>Resolve Conflicts</h1>
        <h3>Conflict No: 2 of 324</h3>
      </div>
      <div class = "float-right">
        <a href = "#" id = "exit-button-link"><div id = "exit-button">x</div></a>
      </div>
      <div class = "clear"></div>
    </div>
    <hr/>
    <div class = "body-solve">
      <form>
        <div class = "float-left">
          <input type = "radio" name = "to-commit" value = "1" class = "radio-btn">
          <div class = "platform">
            <p> &nbsp; On the platform:</p>
            <div class = "well table-well">
              <table class = "table">
                <thead>
                  <th>Column ID</th>
                  <th>Name</th>
                  <th>number of employees<th>
                </thead>
                <tbody>
                  <tr>
                    <td>2</td>
                    <td>Google</td>
                    <td>500</td>
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
                  <th>Column ID</th>
                  <th>Name</th>
                  <th>number of employees<th>
                </thead>
                <tbody>
                  <tr>
                    <td>2</td>
                    <td>Google</td>
                    <td>50</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class = "float-right">
          <button class = "btn confirm-button">Confirm -></button>
        </div>
        <div class = "clear"></div>
      </form>
    </div>
  </div>
</div>
