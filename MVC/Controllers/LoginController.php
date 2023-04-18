<?php

class LoginController extends controller
{
    function index()
    {
        $view = $this->view('login');
    }
    public function user()
    {
        $view = $this->view('user');
    }
    function check()
    {
        if ($_POST['phone'] != '' || $_POST['password'] != '') {
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            $model = $this->model('user');
            $user = $model->check($phone);

            $hash = $user['password'];
            // $hash = $model->getpass($phone);
            if (password_verify($password, $hash)) {
                echo "Mật khẩu khớp";
                $_SESSION['user'] = $user;
                header("location:http://localhost/chatv2/message");
            } else {
                echo "Mật khẩu không khớp";
                header("location:http://localhost/chatv2/login");
            }
            // header("location:http://localhost/chatv2/login");

        }else{
            header("location:http://localhost/chatv2/login");
        }
    }
}
