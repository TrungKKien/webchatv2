<?php
    class Usermessages extends DataBase {
        protected $_table = 'user_messages';

        public function __construct()
        {
            parent::__construct($this->_table);
        }

        public function addimj($message_id, $imj, $user_id)
        {
            $this->insert([
                "user_id" => $user_id,
                "message_id" => $message_id,
                "status" => $imj
            ]);
        }
    }


?>