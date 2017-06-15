$(document).on('submit', '#submitAnalystNameForm', function(){
  $.post('actions/resolve-conflicts.php', $(this).serialize()).done(function(data){
    var object = JSON.parse(data);
    $('body').load("views/eachConflictView.php", {"data": object});
  });
  return false;
});
