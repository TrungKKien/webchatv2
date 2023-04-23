<?php
class MessageController extends controller
{
    public function index()
    {
        $user = $_SESSION['user'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $friend = $this->getFriend($id);
        } else {
            $friend = '';
        }
        if (isset($_POST['chat'])) {
            $chat = $_POST['chat'];
            // echo $chat;
            $group_id = $_GET['grid'];
            $user_id = $_SESSION['user']['id'];
            if (isset($_FILES['attachment'])) {
                $file = $_FILES['attachment'];
                $file_name = $file['name'];
                move_uploaded_file($file['tmp_name'], 'public/image/' . $file_name);
            }
            $model = $this->model('Messages');
            $model->chat($group_id, $user_id, $file_name, $chat);
            header("location:http://localhost/chatv2/message?grid=$group_id");
        }
        // $friend = $this->getFriend();
        // $get
        // $if(isset($_GET['']))
        $listfrends = $this->listfriends($_SESSION['user']['id']);
        $groups = $this->getgroups($_SESSION['user']['id']);

        $listchat = '';
        $usergroups = '';
        $page = 'chatnew';
        if (isset($_GET['grid'])) {
            $page = 'chat';
            $listchat = $this->getchat($_GET['grid']);
            $usergroups = $this->getusergroup($_GET['grid']);
        }
        $view = $this->view('Message', [
            'user' => $user,
            'friend' => $friend,
            "groups" => $groups,
            "list" => $listfrends,
            "listchat" => $listchat,
            "usergroups" => $usergroups,
            'page' => $page
        ]);
    }
    public function searchFriendbyphone()
    {
        $phone = $_POST['phone'];
        $model = $this->model('user');
        $id = $model->search($phone);
        // return $this->getFriend($id);
        header("location:http://localhost/chatv2/message?id=$id");
    }

    public function getFriend($id)
    {
        // $phone = $_POST['phone'];    
        // $id = $this->searchFriends($phone);
        $model = $this->model('user');
        return $model->check2([
            "id" => $id
        ]);
    }
    public function getchat($group_id)
    {
        $model = $this->model('Messages');
        return $model->getchat($group_id);
    }

    public function chat()
    {
        $id = $_SESSION['user']['id'];
        $id_friend = $_GET['id'];
        $name_group = '';
        if (isset($_POST['chat'])) {
            $chat = $_POST['chat'];
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $file_name = $file['name'];
                move_uploaded_file($file['tmp_name'], 'public/image/' . $file_name);
            }
        }
        $group = $this->model('group');
        $id_group = $group->addgroup($name_group);

        $usergroup = $this->model('usergroups');
        $usergroup->add($id, $id_group);
        $usergroup->add($id_friend, $id_group);

        $message = $this->model('messages');
        $message->chat( $id_group, $id, $file_name, $chat);

        header("location:http://localhost/chatv2/message?grid=$id_group");
        echo $id_group;
    }
    public function getgroups($user_id)
    {
        $model = $this->model('group');
        return $model->getgroups($user_id);
    }
    public function listfriends($id)
    {
        $model = $this->model('messages');
        return $model->getfriends($id);
    }
    public function logout()
    {
        unset($_SESSION['user']);
        header("location:http://localhost/Chatv2/login");
    }
    public function addusergroup()
    {
        if(isset($_GET['user_id'])){
            $model= $this->model('usergroups');
            $check = $model->add($_GET['user_id'], $_GET['grid']);
            // header("location:http://localhost/chatv2/message?grid=$_GET[grid]");
        }
    }
    // public function add()
    // {
    //     $id = 1;
    //     $name = "kien";
    //     $model = $this->model('usergroups');
    //     $model->addtest();
    // }
    public function getusergroup($grid)
    {
        $model = $this->model('usergroups');
        return $model->getusergroup($grid);
    }
}
