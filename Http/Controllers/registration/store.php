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

// $email = $_POST['email'];
// $password = $_POST['password'];
// $errors = [];
// if (! empty($errors)) {
//     return view('registration/create.view.php', [
//         'errors' => $errors
//     ]);
// }

// $user= $db->query('select * from users where email = :email', [
//     'email' => $email
// ])->find();

// if ($user) {
//     $errors[] = 'User with this email already exists';
//     return view('registration/create.view.php', [
//         'errors' => $errors
//     ]);
// }








function send_email_verfiy($username,$verfiy_token,$email )
{
    

// if($_SERVER["REQUEST_METHOD"] =="POST")
// {
    // $email = filter_var( $email,FILTER_SANITIZE_EMAIL);

    // if(filter_var($email,FILTER_VALIDATE_EMAIL))
    // {

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
//}}



if($_SERVER["REQUEST_METHOD"]=="POST")
{
   
      $username = $_POST['name'];
      $password = $_POST['password'];
      $password_confirm = $_POST['confirm-password'];
      $email = $_POST['email'];
      $verfiy_token = md5(rand());
      //dd($_POST);

    //   send_email_verfiy("$username","$password","$email");

      $check_email_quuery_run= $db->query('select * from users where email = :email', [
        'email' => $email])->find();
    
    
      if(($check_email_quuery_run))
      {
        //dd("hhhhy");
        $errors['email'] = 'User with this email already exists';
        return view('registration/create.view.php', [
            'errors' => $errors['email']
        ]);
       
          
      }
      else{
           if($password != $password_confirm)

           {
            $errors['password'] = 'the password do not match ';
            return view('registration/create.view.php', [
                'errors' => $errors]);
                echo $errors;
           }
       
           $query_run = $db->query('INSERT INTO users(user_name,user_password,email,verfiy_token)
            Values(:username,:pass,:email,:verfiy_token)', [
            ':username'=> $username,
            ':pass'=> password_hash($password, PASSWORD_DEFAULT),
            ':email' => $email,
            ':verfiy_token'=>$verfiy_token]);
           
          
           if($query_run)
           {
              
            send_email_verfiy("$username","$verfiy_token","$email");
            $auth->attempt($email,$password);
            header("Location: localhost");
           
    

           }else
           {
            $errors['error is insert'] = 'Can not inserted';
        return view('registration/create.view.php', [
            'errors' => $errors]);

           }
      }

}else{
    echo'Can not Pages';
}

?>

