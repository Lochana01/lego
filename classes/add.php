<?php

    class Add
    {
        private $error;

        public function add($data)
        {
            $role = $data['role'];
            $gender = $data['gender'];
            $nic_number = $data['nic_number'];
            $username = $data['username'];
            $password = $data['password'];
            $first_name = ucfirst($data['first_name']);
            $last_name = ucfirst($data['last_name']);
            $address_street_number = $data['address_street_number'];
            $address_street_name = $data['address_street_number'];
            $address_city_name = $data['address_city_name'];
            $address_province_code = $data['address_province_code'];
            $address_post_code = $data['address_post_code'];
            $email_address = $data['email_address'];
            $mobile_number = $data['mobile_number'];
            $land_number = $data['land_number'];
            $medium = $data['medium'];
            $institute = $data['institute'];
            $school = $data['school'];
            $stream = $data['stream'];
            $subject = $data['subject'];
            $profile_image = $data['profile_image'];
            $cover_image = $data['cover_image'];
            $userid = $this->create_userid();
            $url_address = strtolower($first_name) . "." . strtolower($last_name);

            $query = "insert into user(userid,role,gender,nic_number,username,password,first_name,last_name,address_street_number,address_street_name,address_city_name,address_province_code,email_address,url_address,mobile_number,land_number,medium,institute,school,stream,subject,profile_image,cover_image) values('$userid','$role','$gender','$nic_number','$username','$password','$first_name','$last_name','$address_street_number','$address_street_name','$address_city_name','$address_province_code','$email_address','$url_address','$mobile_number','$land_number','$medium','$institute','$school','$stream','$subject','$profile_image','$cover_image')";
            
            $DB = new Database();
            $DB->save($query);
            $query = "delete * from user where userid = '$userid'";
            $DB = new Database();
            $result = $DB->save($query);
            return $result;
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
        
    }

?>