<?php
use core\App;
use core\Authenticator;
use core\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require base_path('vendor/autoload.php');
session_start();
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
                  
        $query_run = $db->query('UPDATE users SET user_password =:pass WHERE email =:email  ', [
        ':pass'=> password_hash($password, PASSWORD_DEFAULT),
        ':email' => $email]);
        
       
      
       if($query_run)
       {
          
        send_email_verfiy($check_email_quuery_run['user_name'],$check_email_quuery_run['verfiy_token'],"$email");
        $auth->attempt($email,$password);
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
            'errors' => $errors['email']
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
                       <h2>Hello  ". $username." </h2> 
                       <h5>Verify youer email address login with the below</h5>
                       <br/><br/>
                       <a href = 'http://localhost/project/index.php?token=$verfiy_token'>Click here transform to page </a>
                    ";

    $mail->Body    = $email_tempelet ;
   

    $mail->send();
    
    sleep(50);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
         

    }

?>

