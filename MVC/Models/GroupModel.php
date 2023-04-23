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
        // $query = "SELECT DISTINCT m.group_id, m.user_id, u.name AS u_name, u.avatar AS u_avatar, g.name, g.avatar
        // FROM `messages` AS m 
        // JOIN users AS u ON m.user_id = u.id
        // JOIN groups AS g ON m.group_id = g.id
        // WHERE m.group_id IN (SELECT DISTINCT (group_id) FROM user_groups WHERE user_id = $user_id)";
//         SELECT MAX(content), users.name, groups.name,  COUNT(user_groups.id)
// FROM `messages` 
// JOIN users ON messages.user_id = users.id 
// JOIN groups ON messages.group_id = groups.id
// JOIN user_groups ON messages.group_id = user_groups.group_id
// WHERE messages.group_id 
// IN (SELECT group_id FROM user_groups WHERE user_id = 1) 
// GROUP BY groups.name
        $query = "SELECT MAX(content), users.name AS u_name, groups.name, groups.avatar, users.avatar AS u_avatar, messages.*
        FROM `messages` 
        JOIN users ON messages.user_id = users.id 
        JOIN groups ON messages.group_id = groups.id
        WHERE group_id IN (SELECT group_id FROM user_groups WHERE user_id = $user_id) 
        GROUP BY users.name";
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
