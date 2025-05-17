<?php
use core\App;
use core\Authenticator;
use core\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require base_path('vendor/autoload.php');
//session_start();
$db = App::resolve(Database::class);
$auth = new Authenticator(); 
$errors = [];



   
      $password = $_POST['password'];
      $password_confirm = $_POST['confirm-password'];
      $email = $_POST['email'];
      


      $check_email_quuery_run= $db->query('select * from users where email = :email', [
        'email' => $email])->find();
    
    
      if(($check_email_quuery_run))
      {
        //dd("hhhhy");
       
      
            if($password == $password_confirm)
            {
                  
        $query_run = $db->query('UPDATE users SET password =:pass WHERE email =:email  ', [
        ':pass'=> password_hash($password, PASSWORD_DEFAULT),
        ':email' => $email]);
        
       
      
       if($query_run)
       {
          
        send_email_verfiy($check_email_quuery_run['user_name'],$check_email_quuery_run['verfiy_token'],"$email");
        $success = "Send Emil ,Please Check the Email!";
        return view('ForgetPassword/create.view.php', [
            'success' => $success
        ]);
        //header("Location: localhost");
       


       }
       
    //    else
    //    {
    //     $errors['error is insert'] = 'Can not inserted';
    //    return view('registration/create.view.php', [
    //     'errors' => $errors]);

    //    }

            }else
            {
                $errors['password-confirm'] = 'the password not equals ';
                return view('ForgetPassword/create.view.php', [
                    'errors' => $errors]);
            }
       
     
  
          
      }
      else{

        $errors['email'] = 'Email Not found';
        return view('ForgetPassword/create.view.php', [
            'errors' => $errors
        ]);
        }

function send_email_verfiy($username,$verfiy_token,$email )
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
    $mail->setFrom('ma2077152@gmail.com',$username);
    $mail->addAddress($email);     //Add a recipient
 

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'YOR Linke the website';
    
    $email_tempelet = "
                    //    <h2>Hello  ". $username." </h2> 
                    //    <h5>Verify youer email address login with the below</h5>
                    //    <br/><br/>
                    //    <a href = 'http://localhost/login?token=$verfiy_token'>Click here transform to page </a>
                    ";

                    $message = "
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Email Verification</title>
</head>
<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;'>
  <table width='100%' cellpadding='0' cellspacing='0' style='padding: 40px 0;'>
    <tr>
      <td align='center'>
        <table width='600' cellpadding='0' cellspacing='0' style='background-color: #ffffff; padding: 40px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);'>
          <tr>
            <td align='center' style='padding-bottom: 20px;'>
              <h2 style='color: #333333;'>Hello, <span style='color:#4CAF50;'>$username</span></h2>
            </td>
          </tr>
          <tr>
            <td style='color: #555555; font-size: 16px; text-align: center;'>
              <p>Please verify your email address to complete your login process.</p>
              <p>Click the button below to confirm:</p>
            </td>
          </tr>
          <tr>
            <td align='center' style='padding: 30px 0;'>
              <a href='http://localhost/login?token=$verfiy_token'
                 style='background-color: #4CAF50; color: white; text-decoration: none; padding: 14px 24px; border-radius: 5px; display: inline-block; font-weight: bold;'>
                 Verify Email
              </a>
            </td>
          </tr>
          <tr>
            <td style='color: #999999; font-size: 14px; text-align: center;'>
              <p>If you did not request this, please ignore this email.</p>
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


    $mail->Body    = $message ;
   

    $mail->send();
    
    //sleep(50);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
         

    }

?>

