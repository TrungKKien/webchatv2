<?php

class AjaxController extends controller
{
    public function check()
    {
        if (isset($_POST['phone'])) {
            $phone = $_POST["phone"];
            $model = $this->model("user");
            $user = $model->checkphone($phone);
            echo $user;
        }
        
        
    }
    public function checkphone()
    {
        if (isset($_POST['phonee'])) {
            echo "Chưa nhập số điện thoại";
        }
    }
    public function checkpass()
    {
        if (isset($_POST['password'])) {
            echo $password = $_POST['password'];
        }
       
    }
    public function checkname()
    {
        if (isset($_POST['name'])) {
            echo "Chưa nhập tên";
            echo $password = $_POST['name'];

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
}
