<?php

    class View
    {
        private $error;

        public function view($data)
        {
            $username = $_POST['username'];
            $query = "select * from user";
            $DB = new Database();
            $result = $DB->read($query);
            return $result;
        }
    
    }

?>