$(document).ready(function () {
    $('#checkBtn').click(function() {
        checked = $("input[type=checkbox]:checked").length;

        if(!checked) {
            alert("Vous devez choisir une réponse");
            return false;
        }

    });
});
