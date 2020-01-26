$(document).ready(function() {
    $("#tableSch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableItem tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('form input').change(function() {
        $('form p').text(this.files.length + " file(s) selected");
    });

    // So am trying to drag and drop and say what I did drop 

    $("#highlight").on('dragenter', function(ev) {
        // Entering drop area. Highlight area
        $("#highlight").toggleClass("highlighted-form");
    });

    $("#highlight").on('dragleave', function(ev) {
        // Going out of drop area. Remove Highlight
        $("#highlight").removeClass("highlighted-form");
    });

    $("#highlight").on('drop', function(ev) {
        // Dropping files
        ev.preventDefault();
        ev.stopPropagation();
        // Clear previous messages
        $("#messages").empty();
        if (ev.originalEvent.dataTransfer) {
            if (ev.originalEvent.dataTransfer.files.length) {
                var droppedFiles = ev.originalEvent.dataTransfer.files;
                for (var i = 0; i < droppedFiles.length; i++) {
                    console.log(droppedFiles[i]);
                    $("#messages").append("<br /> <b>Dropped File </b>" + droppedFiles[i].name);
                    // Upload droppedFiles[i] to server
                }
            }
        }

        $("#highlight").removeClass("highlighted-form");
        return false;
    });
});