<?php

session_start();

include 'config.php'

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Core\Database;
$database =  new Database();



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



if(isset($_POST['signup']))
{
   
      $username = $_POST['name'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $verfiy_token = md5(rand());

    //   send_email_verfiy("$username","$password","$email");

      $check_email_quuery_run=$database->query('SELECT ');
    
    
      if(($check_email_quuery_run))
      {
          $_SESSION['status'] = "Email Id already Exists";
        
          header("Location:../index.php");
          
      }
      else{

       
           $query_run = $database->insertData("users","user_name,user_password,email,verfiy_token","'$username','$password','$email','$verfiy_token'");
           
          
           if($query_run)
           {
              
            send_email_verfiy("$username","$verfiy_token","$email");
            
            $_SESSION['status'] = "insered successful .! please verify youer email addres";
            header("Location:../signup.php");
    

           }else
           {
            $_SESSION['status'] = "felid insert ";
            header("Location:../signup.php");

           }
      }

}else{
    echo'jjpppppp';
}







// if($_SERVER["REQUEST_METHOD"] === "POST")
// {
//     $url ="https://api.web3forms.com/submit";
//     $message = "Me Name Is Mohammed ";
//     $postData = ["access key" => "e4be2ce5-94e7-4995-987b-ceff6805ecb1",
//                 "username"=>$_POST['username'],
//                 "password"=>$_POST['password'],
//                 "email" =>$_POST['email'],
//                 "message" => $message];

//     $ch = curl_init($url);
//     curl_setopt($ch,CURLOPT_PORT,true);
//     curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($postData));
//     curl_setopt($ch,CURLOPT_HTTPHEADER,["Content-Type:application/x-www-form-urlencoded"]); 
    
//     $response=curl_exec($ch);

//     echo $response;
// }
// else
// {
//     echo json_encode(["status" => "error","message" =>"ERROR"]);
// }

?>
