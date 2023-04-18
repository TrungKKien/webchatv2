$(document).ready(function(){
    $("#phone").keyup(function(){
        var user   = $(this).val();
        // $("#message").html(user);
        $.post("http://localhost/webChat/Ajax/check", {phone:user}, function(data){
        // $.post(../../MVC/Controllers/Ajax/check"./Controllers/Ajax/check")
            $("#message").html(data);
        });
    });
});
console.log(hello)

        
