$(document).ready(function () {
    $('#SearchBtnHeader').click(function() {
        search_value();
    });

    $('#SearchBarHeader').keydown(function(e) {
        if(e.keyCode === 13) {
            search_value();
            document.location = $('#SearchBtnHeader').attr("href");
        }
    })
});

function search_value() {
    var searchBtn = $('#SearchBtnHeader');
    var searchBar = $('#SearchBarHeader');
    if(searchBar.val() !==  '')
        searchBtn.attr("href", searchBtn.attr("href") + searchBar.val());
    else
        searchBtn.attr("href", searchBtn.attr("href") + '%20');
}
