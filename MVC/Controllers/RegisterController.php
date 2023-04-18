<?php
class RegisterController extends controller
{
    public function index()
    {
        $view = $this->view('register');
    }

    public function adduser()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
                $model = $this->model('user');
                $check = $model->check($phone);
                if ($check['number_phone'] == $phone) {
                    header("location:http://localhost/chatv2/register");
                } else {
                    if (isset($_POST['name'])) {
                        $name = $_POST['name'];
                        if (isset($_POST['password'])) {
                            $password = $_POST['password'];
                            $password = password_hash($password, PASSWORD_DEFAULT);
                            $file_name = "avatar_user.jpg";
                            if(isset($_FILES['avatar'])){
                                $file = $_FILES['avatar'];
                                $file_name = $file['name'];
                                move_uploaded_file($file['tmp_name'], 'public/image/' . $file_name);
                            }
 
                            $model = $this->model('user');
                            $insert = $model->adduser($name, $phone, $password, $file_name);
                            header("location:http://localhost/chatv2/login");
                        }
                        header("location:http://localhost/chatv2/register");
                    }
                    header("location:http://localhost/chatv2/register");
                }
            }
            header("location:http://localhost/chatv2/register");
        }
    }
}
