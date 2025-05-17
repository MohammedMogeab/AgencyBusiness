<?php
use core\App;
use core\Authenticator;
use core\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require base_path('vendor/autoload.php');

$db = App::resolve(Database::class);
$auth = new Authenticator(); 
$errors = [];









function send_email_verfiy($email,$subject,$message )
{
    


        $mail = new PHPMailer(true);
try {
    
    //Server settings
                          //Enable verbose debug output
    $mail->isSMTP();
                                               //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ma2077152@gmail.com';                     //SMTP username
    $mail->Password   =  'colk abaz pegf mhxx';//'secret';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email);
    $mail->addReplyTo('ma2077152@gmail.com');
    $mail->addAddress('ma2077152@gmail.com');     //Add a recipient
 

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
  

    $mess = "
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset='UTF-8'>
      <title>Contact Message</title>
    </head>
    <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;'>
      <table width='100%' cellpadding='0' cellspacing='0' style='padding: 40px 0;'>
        <tr>
          <td align='center'>
            <table width='600' cellpadding='0' cellspacing='0' style='background-color: #ffffff; padding: 40px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);'>
              <tr>
                <td align='center' style='padding-bottom: 20px;'>
                  <h2 style='color: #333333;'>New Contact Message</h2>
                </td>
              </tr>
              <tr>
                <td style='color: #555555; font-size: 16px;'>
                  <p><strong>Subject:</strong> $subject</p>
                  <p><strong>Message:</strong></p>
                  <p style='margin-left:20px;'>$message</p>
                </td>
              </tr>
              <tr>
                <td style='color: #999999; font-size: 14px; text-align: center; padding-top: 40px;'>
                  <p>This message was sent via the contact form on your website.</p>
                  <p style='margin-top: 20px;'>© 2025 Your Company</p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
    </html>
    ";
                    

    $mail->Body    = $mess ;
   

    $mail->send();
    
    //sleep(50);
} catch (Exception $e) {
    $errors['filed'] = 'Message could not be sent. Mailer Error: {'.$mail->ErrorInfo.'}';
    return view('contact/contact.php', [
        'errors' => $errors['filed']]);
    
}
         

    }
//}}



if($_SERVER["REQUEST_METHOD"]=="POST")
{
   
     $subject = $_POST['subject'];
     $message = $_POST['message'];
      $email = $_POST['email'];
     
     

      $check_email_quuery_run= $db->query('select * from users where email = :email', [
        'email' => $email])->find();
    
    
      if(($check_email_quuery_run))
      {
        //dd("hhhhy");
        send_email_verfiy($email,$subject,$message);
        
        
        $errors['send'] = 'Sucssuful Email';
        return view('contact/contact.php', [
            'errors' => $errors['send']
        ]);
       
          
      }
      else{
           
        $errors['email not found in database plaes login'] = 'Sucssuful Email';
        return view('session/create.view.php');
      }

}else{
    echo'Can not Pages';
}

?>

