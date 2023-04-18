<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/chatv2.css">

    <title>Document</title>
</head>

<body>
    <div class="row">
        <?php require_once "./MVC/Views/blocks/user.php" ?>
        <?php require_once "./MVC/Views/blocks/friends.php" ?>

        <div class="col-7 right " >
            <?php require_once "./MVC/Views/pages/$data[page].php" ?>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="../../public/js/main.js"></script>
    <!-- <link rel="stylesheet" href="public/js/main.js"> -->
    <script>
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
    </script>

</body>

</html>