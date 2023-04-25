<?php

class AjaxController extends controller
{
    public function check()
    {
        if (isset($_POST['phone'])) {
            $phone = $_POST["phone"];
            if (($_POST['phone'] == "")) {
            echo "Chưa nhập số điện thoại";
        }
            $model = $this->model("user");
            $user = $model->checkphone($phone);
            echo $user;
        }
        
        
    }
    public function checkpass()
    {
        if (($_POST['password']) == "") {
            // echo $password = $_POST['password'];
            echo "chua nhap pass word";
        }
       
    }
    public function checkname()
    {
        if (($_POST['name']) == "") {
            echo "Chưa nhập tên";
            // echo $password = $_POST['name'];

        }
    }
    public function updatenamegroup()
    {
        if (isset($_POST['name'])) {
            $name =  $_POST['name'];
            $id = $_GET['grid'];
            $model = $this->model('group');
            $model->updatenamegroup($name, $id);
        }
    }
    public function updateavatargroup()
    {
        if (isset($_POST['name'])) {
            $file = $_FILES['avatar'];
            $file_name = $file['name'];
            move_uploaded_file($file['tmp_name'], 'public/image/' . $file_name);
        }
    }

    public function addimj()
    {
        if(isset($_POST["id"])){
            $id_chat = $_POST["id"];
            $imj = $_POST["imj"];
            if ($imj == "#tim"){
                $imj = 1;
            }if ($imj == "#haha"){
                $imj = 2;
            }
            $model = $this->model("Usermessages");
            $model->addimj($id_chat, $imj, $_SESSION['user']['id']);
        }
    }
}
