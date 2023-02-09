<?php

    class Message
    {
        private $error;

        public function send_message($data)
        {
            $sender = $data['sender'];
            $receiver = $data['receiver'];
            $subject = $data['subject'];
            $message_content = $data['message_content'];
            $message_id = $this->create_messageid();

            $query = "insert into message(message_id,sender,receiver,subject,message_content) values('$message_id','$sender','$receiver','$subject','$message_content')";

            $DB = new Database();
            $result = $DB->save($query);
            return $result;
        }

        private function create_messageid()
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

        private function message_inbox
        {
            $query = "select * from message where username = $username";
            $DB = new Database()
            $result = $DB->read($query);
        }
    }

?>
