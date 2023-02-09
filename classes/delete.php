<?php

    class Delete
    {
        private $error;

        public function delete($data)
        {
            $id = $data['$id'];
            $query = "delete from user where `user`.`id` = $id";
            $DB = new Database();
            $result = $DB->read($query);
            return $result;
        }

    }

?>