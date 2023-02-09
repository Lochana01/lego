<?php
    class user
    {
        public function get_data($userid)
        {
            $query = "select * from user where userid = '$userid' limit 1"; 
            $DB = new Database();
            $result = $DB->read($query);

            if($result)
            {
                $row = $result;
                return $row;
            }
            else
            {
                return false;
            }
        }
    }

?>