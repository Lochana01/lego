<?php
    class User_Management
    {
        private $error;

        public function add_user($data)
        {
            $userid = $this->create_userid();
            $role = ucfirst($data['role']);
            $gender = ucfirst($data['gender']);
            $nic_number = $data['nic_number'];
            $username = $data['username'];
            $password = $data['password'];
            $first_name = ucfirst($data['first_name']);
            $last_name = ucfirst($data['last_name']);
            $address_street_number = $data['address_street_number'];
            $address_street_name = ucfirst($data['address_street_number']);
            $address_city_name = ucfirst($data['address_city_name']);
            $address_province_code = ucfirst($data['address_province_code']);
            $address_post_code = $data['address_post_code'];
            $email_address = $data['email_address'];
            $mobile_number = $data['mobile_number'];
            $land_number = $data['land_number'];
            $medium = ucfirst($data['medium']);
            $institute = ucfirst($data['institute']);
            $school = ucfirst($data['school']);
            $stream = ucfirst($data['stream']);
            $subject = ucfirst($data['subject']);
            $profile_image = $data['profile_image'];
            $cover_image = $data['cover_image'];
            $url_address = strtolower($first_name) . "." . strtolower($last_name);

            $query = "insert into user(userid,role,gender,nic_number,username,password,first_name,last_name,address_street_number,address_street_name,address_city_name,address_province_code,email_address,url_address,mobile_number,land_number,medium,institute,school,stream,subject,profile_image,cover_image) values('$userid','$role','$gender','$nic_number','$username','$password','$first_name','$last_name','$address_street_number','$address_street_name','$address_city_name','$address_province_code','$email_address','$url_address','$mobile_number','$land_number','$medium','$institute','$school','$stream','$subject','$profile_image','$cover_image')";
            $DB = new Database();
            $result = $DB->save($query);
        }

        private function create_userid()
        {
            $length = rand(4, 19);
            $number = "";
            for($i=0; $i < $length; $i++)
            {
                $new_rand = rand(0, 9);
                $number = $number . $new_rand;
            }
            return $number;
        }

        public function update_user($data)
        {
            $userid = $data['userid'];
            $nic_number = $data['nic_number'];
            $username = $data['username'];
            $password = $data['password'];
            $first_name = ucfirst($data['first_name']);
            $last_name = ucfirst($data['last_name']);
            $address_street_number = $data['address_street_number'];
            $address_street_name = ucfirst($data['address_street_number']);
            $address_city_name = ucfirst($data['address_city_name']);
            $address_province_code = ucfirst($data['address_province_code']);
            $address_post_code = $data['address_post_code'];
            $email_address = $data['email_address'];
            $mobile_number = $data['mobile_number'];
            $land_number = $data['land_number'];
            $medium = ucfirst($data['medium']);
            $institute = ucfirst($data['institute']);
            $school = ucfirst($data['school']);
            $stream = ucfirst($data['stream']);
            $subject = ucfirst($data['subject']);
            $profile_image = $data['profile_image'];
            $cover_image = $data['cover_image'];
            $url_address = strtolower($first_name) . "." . strtolower($last_name);

            $query = "update user set nic_number = '$nic_number',username = '$username',password = '$password',first_name = '$first_name',last_name = '$last_name',address_street_number = '$address_street_number',address_street_name = '$address_street_name',address_city_name = '$address_city_name',address_province_code = '$address_province_code',address_post_code = '$address_post_code',email_address = '$email_address',url_address = '$url_address',mobile_number = '$mobile_number',land_number = '$land_number',medium = '$medium',school = '$school',institute = '$institute',stream = '$stream',subject = '$subject',profile_image = '$profile_image',cover_image = '$cover_image' where userid = '$userid'";

            $DB = new Database();
            $result = $DB->save($query);
            return $result;
        }

        public function delete_user($data)
        {
            $userid = $data['userid'];
            $query = "delete from user where id = '$userid'";
            $DB = new Database();
            $result = $DB->erase($query);
            return $result;
        }

        public function search_user($data)
        {
            $username = $data['username'];
            $query = "select * from user where username = '$username'";
            $DB = new Database();
            $result = $DB->read($query);
            return $result;
        }

        public function view_users($data)
        {
            $query = "select * from user";
            $DB = new Database();
            $result = $DB->read($query);
            return $result;
        }

    }
?>