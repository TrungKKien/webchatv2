<?php
    class MessagesModel extends DataBase
    {
        protected $_table = 'messages';

        public function __construct() {
            parent::__construct($this->_table);
        }

        public function chat($group_id, $user_id, $attachment, $chat )
        {
            $this->insert([
                "attachment" => $attachment,
                "user_id" => $user_id,
                "group_id" => $group_id,
                "content" => $chat
            ]);
        }
        public function getchat($group_id)
        {
            $query = "SELECT * FROM messages JOIN users ON messages.user_id = users.id WHERE messages.group_id = $group_id";
            return $this->mysqli($query);
        }
        public function getfriends($id)
        {
            // $query = "SELECT u.name, u.avatar, ug.*  FROM users AS u JOIN user_groups AS ug  ON u.id = ug.user_id WHERE u.id IN (SELECT DISTINCT(m.user_id) FROM messages AS m WHERE m.group_id IN (SELECT DISTINCT(group_id) FROM messages WHERE user_id = $id))";
            // echo $query = "SELECT * FROM users JOIN messages ON users.id = messages.user_id WHERE messages.group_id IN (SELECT DISTINCT(group_id) FROM `messages` WHERE user_id = $id)";
            
            $query = "SELECT u.name AS user_name, u.avatar AS user_avatar, m.*, g.*  FROM users AS u JOIN messages AS m ON u.id = m.user_id JOIN groups AS g ON m.group_id = g.id WHERE m.group_id IN (SELECT DISTINCT(group_id) FROM `messages` WHERE user_id = $id)";
            return $this->mysqli($query);
        }
    }
    // SELECT DISTINCT m.group_id, u.name FROM `messages` AS m JOIN users AS u ON m.user_id = u.id WHERE m.group_id = 1

?>