$(document).ready(function () {
    $('#SearchBtn').click(function() {
        $('#SearchBtn').attr("href", $('#SearchBar').val());
    });

    $('#SearchBar').keydown(function(e) {
        if(e.keyCode === 13) {
            $('#SearchBtn').attr("href", $('#SearchBar').val());
            document.location = $('#SearchBtn').attr("href");
        }
    })
});
