<div class = "container-fluid" id = "body-main-input">
  <div class = "top-text">
    <h1>Resolve Conflicts</h1>
    <p>Enter your full name below and start resolving conflicts</p>
  </div>
  <div class = "well">
    <form class = "form" method = "post" id = "submitAnalystNameForm" action = "actions/resolve-conflicts.php">
      <div class = "form-group">
        <label for = "full-name" class = "form-label">Full Name</label>
        <input class = "form-control" id = "analyst_name" type = "text" name = "analyst_name" placeholder = "Full Name..." required="required">
      </div>
      <div class = "form-group">
        <!-- <input type = "submit" class = "btn" value = "Continue ->"> -->
        <button name="submit-name" class = "btn" >Continue -></button>
      </div>
    </form>
  </div>
</div>
