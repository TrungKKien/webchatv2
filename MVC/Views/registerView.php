<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/login.css">
    <title>sign in</title>
</head>

<body>
    <div class="wapper">
        <form method="post" action="http://localhost/chatv2/Register/adduser" enctype="multipart/form-data">
            <h4 class="form-group" for="exampleInputEmail1">WEBCHAT REGISTER</h4>
            <div class="form-group">
                <div class="hoten">
                    <label for="">Tên người dùng :</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Number Phone :</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="number phone">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password :</label>
                <input type="password" name="password" id="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Ảnh Đại Điện :</label>
                <input type="file" class="form-control" name="avatar" id="" placeholder="img">
            </div>
            <div style="color : red" id="message"></div><br>
            <button type="submit" name="submit" class="btn btn-primary">ĐĂNG KÝ</button>


        </form>
        <button style="background-color: rgb(227, 227, 227);" type="submit" class="btn"><a href="http://localhost/Chatv2/login">ĐĂNG NHẬP</a></button>

    </div>




    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- <script src="public/js/main.js"></script> -->

    <script>
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
        $(document).ready(function() {

            $("#phone").keyup(function() {
                var phone = $(this).val();
                $.post("http://localhost/Chatv2/Ajax/checkphone",{
                    phonee: phone
                }, function(data) {
                    $("#massage").html(data);
                });
            });
        });

    </script>
</body>

</html>