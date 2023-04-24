// alert("hello");
$(document).ready(function() {
    $("#phone").keyup(function() {
        var user = $(this).val();
        $.post("http://localhost/Chatv2/Ajax/check", {
            phone: user
        }, function(data) {
            $("#message").html(data);
        });
    });
    
});
$(document).ready(function() {
    $("#name").keyup(function() {
        var namee = $(this).val();
        console.log(namee);
        $.post("http://localhost/Chatv2/Ajax/checkname",{
            name: namee
        }, function(data) {
            $("#massage").html(data);
        });
    });
    $("#password").keyup(function() {
        var password = $(this).val();
        $.post("http://localhost/Chatv2/Ajax/checkpass",{
            password: password
        }, function(data) {
            $("#massage").html(data);
        });
    });
});


$(document).ready(function () {
    $(".list_friends li").click(function () {
        $('.wraper2').hide();
        $('.wraper2:first-child').fadeIn();

        $(".list_friends li").removeClass("hover");
        $(this).addClass("hover");

        let tab_content = $(this).attr('id');
        $('.wraper2').hide();
        $(tab_content).fadeIn();
        return false;
    });
});
