<?php

namespace App\Core;
use App\Vendor\PHPMailer\PHPMailer;
use App\Vendor\PHPMailer\SMTP;
use App\Vendor\PHPMailer\Exception;

class SendMail{
    public function __construct(string $email, string $subject, string $html){
            $mail = new PHPMailer();
            try {
                $mail->SMTPDebug = 2;                      
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.outlook.com';                    
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'pa.sakura@outlook.fr';                     
                $mail->Password   = 'sakura12345@';
                $mail->SMTPSecure = 'STARTTLS';                                       
                $mail->Port       = 587;              
            
                $mail->From = "pa.sakura@outlook.fr";
                $mail->FromName = "sakura";
                $mail->addAddress($email);  

                $mail->isHTML(true);                   
                $mail->Subject = $subject;
                $mail->Body    = $html;
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $th) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }