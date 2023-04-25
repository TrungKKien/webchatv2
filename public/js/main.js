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
// console.log("hello")

const addMenu = document.querySelector(".chucnang");

function openMenuCon() {
    addMenu.classList.add("open");
}

function removeOpen() {
    addMenu.classList.remove("open");
}

$(document).ready(function () {
    $("#name_group").blur(function(){
        var namee = $(this).val();

        $.post("http://localhost/Chatv2/Ajax/updatenamegroup?grid=<?= $_GET['grid']?>", {
            name: namee

        }, function(data){
            $("#name").html(data);
        });
    });
});

$(document).ready(function(){
    $('.friend').on('click', function () { 
      $(this).siblings().removeClass('hover');
      $(this).addClass('hover');  
    })
})

$(document).ready(function() {
    $("#phone").keyup(function() {
        var user = $(this).val();
        // $("#message").html(user);
        $.post("http://localhost/Chatv2/Ajax/check", {
            phone: user
        }, function(data) {
            // $.post(../../MVC/Controllers/Ajax/check"./Controllers/Ajax/check")
            $("#message").html(data);
        });
    });
});

$(document).ready(function() {

    $("#name").keyup(function() {
        var name = $(this).val();
        $.post("http://localhost/Chatv2/Ajax/checkname",{
            name: name
        }, function(data) {
            $("#massage").html(data);
        });
    });
});
$(document).ready(function() {

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
    $(".chat a").click(function () {  
        let id = $(this).attr("id");
        let imj = $(this).attr("href");
        $.post("http://localhost/Chatv2/Ajax/addimj", {
            id: id,
            imj: imj
        }, function (data) { 
            $("#seen").html(data);

        });
        // alert(imj + id);
        // alert(key);
    });
});