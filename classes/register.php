<?php

    class Register
    {
        private $error = "";

        public function evaluate($data)
        {
            foreach($data as $key => $value)
            {
                if($key == "role")
                {
                    if(empty($value))
                    {
                        $this->error = $this->error . $key . " is empty!<br>";
                    }
                }

                if($key == "gender")
                {
                    if(empty($value))
                    {
                        $this->error = $this->error . $key . " is empty!<br>";
                    }
                }

                if($key == "nic_number")
                {
                    if(empty($value))
                    {
                        $this->error = $this->error . $key . " is empty!<br>";
                    }
                }

                if($key == "username")
                {
                    if(empty($value))
                    {
                        $this->error = $this->error . $key . " is empty!<br>";
                    }
                }

                if($key == "password")
                {
                    if(empty($value))
                    {
                        $this->error = $this->error . $key . " is empty!<br>";
                    }
                }

                if($key == "retype_password")
                {
                    if(empty($value))
                    {
                        $this->error = $this->error . $key . " is empty!<br>";
                        //if($value('retype_password') != $value('password'))
                        //{
                        //    $this->error = $this->error . $key . "enter the password you entered before!<br>";
                        //}
                    }
                }

                if($key == "first_name")
                {
                    if (is_numeric($value) || strstr($value, " "))
                    {
                        $this->error = $this->error . "Numbers are not acceptable in first name!<br>";
                    }
                    if (strstr($value, " "))
                    {
                        $this->error = $this->error . "White spaces are not acceptable in first name!<br>";
                    }
                }

                if($key == "last_name")
                {
                    if(is_numeric($value) || strstr($value, " "))
                    {
                        $this->error = $this->error . "Numbers are not acceptable in last name!<br>";
                    }
                    if (strstr($value, " "))
                    {
                        $this->error = $this->error . "white spaces are not acceptable in last name!<br>";
                    }
                }

                if($key == "address_street_number")
                {
                    if(empty($value))
                    {
                        $this->error = $this->error . $key . " is empty!<br>";
                    }
                }

                if($key == "address_street_name")
                {
                    if(is_numeric($value) || strstr($value, " "))
                    {
                        $this->error = $this->error . "Numbers are not acceptable in address street name!<br>";
                    }
                    if (strstr($value, " "))
                    {
                        $this->error = $this->error . "white spaces are not acceptable in address street name!<br>";
                    }
                }

                if($key == "address_city_name")
                {
                    if(is_numeric($value) || strstr($value, " "))
                    {
                        $this->error = $this->error . "Numbers are not acceptable in address city name!<br>";
                    }
                    if (strstr($value, " "))
                    {
                        $this->error = $this->error . "white spaces are not acceptable in address city name!<br>";
                    }
                }

                if($key == "address_province_code")
                {
                    if(is_numeric($value) || strstr($value, " "))
                    {
                        $this->error = $this->error . "Numbers are not acceptable in address province code!<br>";
                    }
                    if (strstr($value, " "))
                    {
                        $this->error = $this->error . "white spaces are not acceptable in address province code!<br>";
                    }
                }

                if($key == "address_post_code")
                {
                    if(is_string($value))
                    {
                        if(empty($value))
                        {
                            $this->error = $this->error . $key . " is empty!<br>";
                        }
                    }
                }

                if($key == "email")
                {
                    if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value))
                    {
                        $this->error = $this->error . "invalid email address!<br>";
                    }
                }

                if($key == "mobile_number")
                {
                    if (strstr($value, " "))
                    {
                        $this->error = $this->error . "white spaces are not acceptable in mobile number!<br>";
                    }
                }

                if($key == "land_number")
                {
                    if (strstr($value, " "))
                    {
                        $this->error = $this->error . "white spaces are not acceptable in land number!<br>";
                    }
                }

                if($key == "medium")
                {
                    if(is_numeric($value) || strstr($value, " "))
                    {
                        $this->error = $this->error . "Numbers are not acceptable in address province code!<br>";
                    }
                    if (strstr($value, " "))
                    {
                        $this->error = $this->error . "white spaces are not acceptable in address province code!<br>";
                    }
                }

            }
            if($this->error == "")
            {
                $this->create_user($data);
            }
            else
            {
                return $this->error;
            }
        }

        public function create_user($data)
        {
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
            $address_province_code = ucwords($data['address_province_code']);
            $address_post_code = $data['address_post_code'];
            $email_address = $data['email_address'];
            $mobile_number = $data['mobile_number'];
            $land_number = $data['land_number'];
            $medium = ucfirst($data['medium']);
            $institute = ucfirst($data['institute']);
            $school = ucfirst($data['school']);
            $stream = ucfirst($data['stream']);
            $subject = ucwords($data['subject']);
            $profile_image = $data['profile_image'];
            $cover_image = $data['cover_image'];
            $userid = $this->create_userid();
            $url_address = strtolower($first_name) . "." . strtolower($last_name);

            $query = "insert into user(userid,role,gender,nic_number,username,password,first_name,last_name,address_street_number,address_street_name,address_city_name,address_province_code,email_address,url_address,mobile_number,land_number,medium,institute,school,stream,subject,profile_image,cover_image) values('$userid','$role','$gender','$nic_number','$username','$password','$first_name','$last_name','$address_street_number','$address_street_name','$address_city_name','$address_province_code','$email_address','$url_address','$mobile_number','$land_number','$medium','$institute','$school','$stream','$subject','$profile_image','$cover_image')";
            
            $DB = new Database();
            $DB->save($query);
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