<?php
class UserModel extends DataBase
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct($this->table);   
    }

    function check($phone)
    {
        $query = $this->select(["number_phone" => $phone]);
        return mysqli_fetch_assoc($query);
    }
    public function check2 ($table, $where = [])
    {
        $select = $this->select($table, $where);
        $user = mysqli_fetch_assoc($select);
        return $user;
    }

    public function getfriend($id_nhan)
    {
        return $this->select(["id" => $id_nhan]);
    }

    public function adduser($name, $phone, $password, $file_name)
    {
        return $this->insert([
            "name" => $name,
            "number_phone" => $phone,
            "password" => $password,
            "avatar" => $file_name
        ]);
    }
    public function search($phone)
    {
        $id = $this->select(["number_phone" => $phone]);
        $id =  mysqli_fetch_assoc($id);
        return $id['id'];
    }
    public function checkphone($phone)
    {
        if($phone!=''){
            $query = $this->select(["number_phone" => $phone]);
            $user = mysqli_num_rows($query);
            $kq = false;
            if($user > 0){
                $kq = "Số điện thoại đã có người sử dụng";           
            }
            return $kq;
        }
    }
    public function addtest()
    {
        $id = 1;
        $name = "kien";
        $this->update( [
            "id" => $id
        ]);
    }
}
// [
//             "id" => $id,
//             "name" => $name
//         ] 