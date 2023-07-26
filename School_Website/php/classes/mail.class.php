<?php

class Mail {
    private $maili = "reali.studentteacher.volunteer@gmail.com";
    public function connection_removed($to, $subject, $message) {
        $headers = $this -> goodHeader();
        $message = wordwrap($message,70);
        $message = $this -> styling('<p class="data">'.$message.'</p>');
        $headers .= "From: ".$this->maili."" . "\r\n" .
                    "CC: ".$to."";
        $this -> sendMail($to,$subject,$message,$headers);
    }
    public function sendDataAddingTeacher($student, $teacher) {
        $to1 = $student['user_mail'];
        $to2 = $teacher['user_mail'];
        $subject1 = "התווסף לכם מורה";
        $message1 = $this -> dataMessage($teacher['user_name'], $teacher['user_grade'], $teacher['user_mail'], $teacher['user_phone']);
        $subject2 = "התווסף לכם תלמיד";
        $message2 = $this -> dataMessage($student['user_name'], $student['user_grade'], $student['user_mail'], $student['user_phone']);
        $headers1 = $this -> goodHeader();
        $headers1 .= "From: ".$this->maili."" . "\r\n" .
                    "CC: ".$to1."";
        $headers2 = $this -> goodHeader();
        $headers2 .= "From: ".$this->maili."" . "\r\n" .
                    "CC: ".$to2."";
        $this -> sendMail($to1,$subject1,$message1,$headers1);
        $this -> sendMail($to2,$subject2,$message2,$headers2);
    }
    private function dataMessage($name, $grade, $mail, $phone) {
        $message = '<h1 class="title"> <b>פרטים</b> </h1>';
        $message.="\r\n";
        $message.= '<p class="data">'.$name.' <b>:שם</b> </p><br>';
        if($grade == 1) {
            $message.= '<p class="data"> כיתה: י</p><br>';
        } else if($grade == 2) {
            $message.= '<p class="data"> כיתה: יא</p><br>';
        } else if($grade == 3) {
            $message.= '<p class="data"> כיתה: יב</p><br>';
        }
        $message.= '<p class="data">'.$mail.' <b>:מייל</b> </p><br>';
        $message.= '<p class="data">'.$phone.' <b>:טלפון</b> </p><br>';
        return $this -> styling($message);
    }
    private function sendMail($to, $subject, $message, $headers) {
        mail($to, $subject, $message, $headers);
    }
    public function sendData($myMail, $other) {
        $subject1 = "מידע על המורה\תלמיד שלכם";
        $message1 = $this -> dataMessage($other['user_name'], $other['user_grade'], $other['user_mail'], $other['user_phone']);
        $headers1 = $this -> goodHeader();
        $headers1 .= "From: ".$this -> maili."" . "\r\n" .
                    "CC: ".$myMail."";
        $this -> sendMail($myMail,$subject1,$message1,$headers1);
    }
    private function goodHeader() {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        return $headers;
    }
    private function styling($messg) {
    $message = '<html>
        <head>
    <style>
        .title {
            text-align: center;
            font-size: 35px;
            color: white;
            font-weight: bold;
        }
        .data {
            text-align: right;
            font-size: 20px;
            color: white !important;
            font-weight: bold;
        }
        a {
            color: white !important;
        }
        .mail {
            margin-left: auto;
            margin-right: auto;
            align-self: center;
            width: 450px;
            background-color: rgb(2, 72, 133);
            border-radius:15px;
            padding: 25px;
        }
    </style>
    </head>
    <body>
    <div class="mail">';
    $message.= $messg;
    $message.='</div>
    </body>
    </html>';
        return $message;
    }

}