<?php
    class Login
    {
        private $error = "";

        public function evaluate($data)
        {
            $username = addslashes($data['username']);
            $password = addslashes($data['password']);
            $role = $data['role'];

            $query = "select * from user where username = '$username' limit 1";

            $DB = new Database();
            $result = $DB->read($query);

            if($result)
            {
                $row = $result;
                if($password == $row['password'] && $role == $row['role'])
                {
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['role'] = $row['role'];
                }
                else
                {
                    $this->error = $this->error . "The credentials are incorrect!<br>";
                }
            }
            else
            {
                $this->error = $this->error . "The credentials are incorrect!<br>";
            }
            return $this->error;
        }

        public function check_login($userid)
        {
            if ((is_numeric($userid))) 
            {
                $query = "select userid from user where userid = '$userid' limit 1";
                $DB = new Database();
                $result = $DB->read($query);

                if ($result)
                {
                    $user_data = $result;
                    return $user_data;
                }
                else
                {
                    header("Location: login.php");
                    die;
                }
            }       
            else
            {
                header("Location: login.php");
                die;
            }
        }

    }
?>