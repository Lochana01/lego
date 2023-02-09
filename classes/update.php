<?php

    class Update
    {
        private $error;

        public function renew($data)
        {
            $userid = $data['userid'];
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

            $query = "update user set nic_number = '$nic_number',username = '$username',password = '$password',first_name = '$first_name',last_name = '$last_name',address_street_number = '$address_street_number',address_street_name = '$address_street_name',address_city_name = '$address_city_name',address_province_code = '$address_province_code',address_post_code = '$address_post_code',email_address = '$email_address',mobile_number = '$mobile_number',land_number = '$land_number',medium = '$medium',school = '$school',institute = '$institute',stream = '$stream',subject = '$subject',profile_image = '$profile_image',cover_image = '$cover_image' where userid = '$userid'";

            $DB = new Database();
            $result = $DB->save($query);
            return $result;
        }

    }

?>