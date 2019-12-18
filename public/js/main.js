$(document).ready(function(){
  $("#tableSch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tableItem tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $('form input').change(function () {
    $('form p').text(this.files.length + " file(s) selected");
  });

});
