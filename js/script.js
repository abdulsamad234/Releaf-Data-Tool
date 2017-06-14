$(document).on('submit', '#submitAnalystNameForm', function(){
  $.post('actions/resolve-conflicts.php', $(this).serialize()).done(function(data){
    var object = JSON.parse(data);
    $('body').load("views/eachConflictView.php", {"data": object});
  });
  return false;
});
// $(document).on('submit', '#newEntryForm', function(){
//   $.post('actions/validate_input_file.php', $(this).serialize()).done(function(data){
//     alert(data);
//   })
//   return false;
// })
