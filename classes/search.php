<?php

    class Search
    {
        private $error;

        public function look($data)
        {
            $username = $_POST['username'];
            $query = "select * from user where username = '$username'";
            $DB = new Database();
            $result = $DB->read($query);
            return $result;
        }
    
    }

?>