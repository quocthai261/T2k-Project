$(document).ready(function() {
    $("#username").keyup(function() {
        var un = $(this).val();
        $.post("./Ajax/checkUsername", {un:un}, function(data){
            $("#type").html(data);
        });
    });
})
