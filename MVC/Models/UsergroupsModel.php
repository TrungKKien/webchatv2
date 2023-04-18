<?php
    class UsergroupsModel extends DataBase
    {
        protected $_table = 'user_groups';

        public function __construct() {
            parent::__construct($this->_table);
        }
        public function add($user_id, $group_id)
        {
            echo $query = "SELECT id FROM user_groups WHERE group_id = $group_id && user_id = $user_id";
            $check = $this->mysqli($query);
            $check = count(mysqli_fetch_all($check));
            if($check > 0){
                return 0;
            }else{
                return $this->insert([
                    "user_id" => $user_id,
                    "group_id" => $group_id
                ]);
            }
        }
        public function getusergroup($grid)
        {
            $query = "SELECT u.name, u.avatar, ug.* FROM user_groups AS ug JOIN users AS u ON ug.user_id = u.id WHERE group_id = $grid";
            return $this->mysqli($query);
        }
    }


?>