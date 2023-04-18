<?php
class GroupModel  extends DataBase
{
    protected $_table = 'groups';

    public function __construct()
    {
        parent::__construct($this->_table);
    }

    public function addgroup($name_group)
    {
        $query = $this->insert([
            "name" => $name_group
        ]);
        // $value = "SELECT LAST_INSERT_ID()";
        $new_id = mysqli_insert_id($this->_conn);
        return $new_id;
        // $query = $this->mysqli($value);
        // echo $query;

    }
    public function getgroup($id_user)
    {
        $query = "SELECT *
         FROM groups AS g
            JOIN user_groups AS ug ON g.id = ug.group_id 
            JOIN users AS u ON ug.user_id = u.id
             WHERE g.id IN(SELECT DISTINCT(group_id) FROM user_groups WHERE user_id = $id_user)";
        return $this->mysqli($query);
    }
    public function getgroups($user_id)
    {
        $query = "SELECT DISTINCT m.group_id, m.user_id, u.name AS u_name, u.avatar AS u_avatar, g.name, g.avatar
        FROM `messages` AS m 
        JOIN users AS u ON m.user_id = u.id
        JOIN groups AS g ON m.group_id = g.id
         
        WHERE m.group_id IN (SELECT DISTINCT (group_id) FROM user_groups WHERE user_id = $user_id)";
        return $this->mysqli($query);
    }

    public function adduser($id, $id_friend, $id_group)
    {
        $query = "INSERT INTO user_groups (user_id, group_id) VALUES ($id, $id_group), ($id_friend, $id_group)";
        return $this->insert($query);
    }
    public function updatenamegroup($name , $id)
    {
        $this->update([
            "id" => $id
        ],[
            "name" => $name
        ]);
    }
}
