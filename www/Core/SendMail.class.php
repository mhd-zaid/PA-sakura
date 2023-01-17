<?php

namespace App\Core;
use App\Vendor\PHPMailer\PHPMailer;
use App\Vendor\PHPMailer\SMTP;
use App\Vendor\PHPMailer\Exception;

class SendMail{
    public function __construct(string $email, string $subject, string $html, string $succes, string $fail){
            $mail = new PHPMailer();
            try {
                $mail->SMTPDebug = 0;                      
                $mail->isSMTP();                                            
                $mail->Host       = '';                    
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = '';                     
                $mail->Password   = '';
                $mail->SMTPSecure = '';                                       
                $mail->Port       = ;              
            
                $mail->From = "pa.sakura@outlook.fr";
                $mail->FromName = "sakura";
                $mail->addAddress($email);  

                $mail->isHTML(true);                   
                $mail->Subject = $subject;
                $mail->Body    = $html;
                $mail->send();
                echo $succes;
            } catch (Exception $th) {
                echo $fail;
            }
        }
    }
