<div class = "container-fluid" id = "body-main-input">
  <div class = "top-text">
    <h1>Upload new input file!</h1>
    <p><strong>Instruction:</strong> In the input field, select multiple csv files that you want to merge and they will be merged to merged.csv by default.</p>
  </div>
  <div class = "input-body well">
    <div class = "alert-for-upload">
      <div class = "alert alert-success">
        <p>All import files were merged successfully.</p>
      </div>
      <div class = "alert alert-danger">
        <p><strong>There was/were conflict(s): The company id from test_1.csv already exists on the platform.</strong></p>
      </div>
    </div>
    <form enctype= "multipart/form-data" id = "newEntryForm" method = "post" class = "form">
      <div class = "form-group">
        <label class = "form-label" for = "input-file">Input file(s) --- Enter the csv files to merge</label>
        <div class = "clear"></div>
        <input type = "file" id = "input-file" class = "form-control" placeholder = "Input file" name = "inputs[]" required = "required" multiple = "multiple">
      </div>
      <div class = "form-group">
        <button class = "btn btn-default" id = "merge-button" name = "submit-form" style = "margin-bottom: -15px;">Merge</button>
      </div>
    </form>
  </div>
</div>
<script type = "text/javascript" src = "js/papaparse.min.js"></script>
