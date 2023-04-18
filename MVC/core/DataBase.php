<?php 
    class DataBase{
        public $_conn;
        protected $_table;
        function __construct($_table)
        {   
            $this->_table = $_table;
            $this->_conn = new mysqli('localhost', 'root', '', 'chatv2');
            mysqli_set_charset($this->_conn, "utf8");
        }

        public function value($value = [])
        {
            $set = [];
            $value = [];
            foreach($value as $k => $v){
                array_push($set, $k);
                array_push($value, '"'.$v.'"');
            }
            return ' (' . implode(', ', $set) . ') VALUES (' . implode(', ', $value) .') ';
        }

        public function insert( $value = [])
        {
            $query = "INSERT INTO $this->_table";
            if (count($value) > 0){
                $query .= $this->value($value);
            }
            echo $query;
            return mysqli_query($this->_conn, "$query");            
        }

        public function where ($where = [])
        {
            $arr = [];
            foreach($where as $k => $v){
                array_push($arr, $k .' = "'. $v.'" ');
            }
            return ' WHERE ' . implode(' || ', $arr);
        }
        public function select( $where = [])
        {
            $query = "SELECT * FROM $this->_table ";
            if(count($where) > 0){
                $query .= $this->where($where);
            }
            // echo $query;
            return mysqli_query($this->_conn, "$query");
        }
        public function selectbyid( $where = [])
        {
            
        }

        public function delete($where = [])
        {
            $query = "DELETE FROM $this->_table ";
            if (count($where) > 0){
                $query .= $this->where($where);

            }
            echo $query;
            return mysqli_query($this->_conn, "$query");
        }

        
        public function set($set = [])
        {
            $arr = [];
            foreach($set as $k => $v){
                array_push($arr, $k .' = "'. $v .'" ');
            }
            return ' SET ' . implode(', ', $arr) ;
        }

        public function update($where = [], $set = [] )
        {
            $query = "UPDATE $this->_table";
            if (count($set) > 0){
                $query .= $this->set($set);
                if(count($where) > 0){
                    $query .= $this->where($where);
                    return mysqli_query($this->_conn, "$query");
                }
            }else{
                echo "không có gì để ";
            }
            echo $query;
        }
        function mysqli($query)
        {
            return mysqli_query($this->_conn,"$query");
        }

    }

?>