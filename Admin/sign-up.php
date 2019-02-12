<?php
$db_dsn = array(
    'host' => 'localhost',
    'dbname' => 'db_hackathon',
    'charset' => 'utf8'
);

$dsn = 'mysql:'.http_build_query($db_dsn,'',';');

$db_user = 'root';
$db_pass = '';

try{
    $pdo = new PDO($dsn,$db_user,$db_pass);
}catch(PDOException $exception){
    echo 'Wrong message:'.$exception->getMessage();
    exit();
}
session_start();
if(isset($_POST['submit'])){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    $apiKey = '684ac4cf99571f93a4f0cdc417f930e9-us20';
    $listID = 'bddfdfc662';
    // MailChimp API URL
    $memberID = md5(strtolower($email));
    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
    
    // member information
    $json = json_encode([
        'email_address' => $email,
        'status'        => 'subscribed',
        'merge_fields'  => [
            'FNAME'     => $fname,
            'LNAME'     => $lname
        ],
        'country'       => $country
    ]);
    
    // send a HTTP POST request with curl
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    $email_to = "$email";
    $email_subject = "Thank you for subcribing!!!";
    $email_from = "hackathons@tbl_user.com";
    $headers = 'From: '.$email_from."\r\n".
                'Reply-To: '.$email_from."\r\n" .
                'X-Mailer: PHP/' . phpversion();

    $check_email_query = "SELECT COUNT(email) FROM tbl_user WHERE email = ?";
    $email_set = $pdo -> prepare($check_email_query);
    $email_set -> execute(array($email));

     // store the status message based on response code
    if ($httpCode == 200) {
        $_SESSION['msg'] = '<p style="color: #34A853">You have successfully subscribed to CodexWorld.</p>';
        if($email_set -> fetchColumn() > 0){
            $last_update = date('Y-m-d H:i:s');
            $exist_update_query = "UPDATE tbl_user SET first_name = ?, last_name =?, country = ?, last_update =? WHERE email = ?";
            $exist_set = $pdo -> prepare($exist_update_query);
            $exist_set -> execute(
                array($fname,$lname,$country,$last_update,$email)
            );
            $email_message1 = "Your information already updated, thank you for coming again!!";
            //mail function  @ to prevent error reporting in local server
            @mail($email_to, $email_subject, $email_message1, $headers);
    
        }else{
            $last_update = date('Y-m-d H:i:s');
            $add_info_query = "INSERT INTO tbl_user ( `first_name`, `last_name`, `email`, `country`, `last_update`) VALUE (?,?,?,?,?)";
            $add_set = $pdo -> prepare($add_info_query);
            $add_set -> execute(
                array($fname,$lname,$email,$country,$last_update)
            );
            $email_message1 = "Thank you for coming!!";
            //mail function  @ to prevent error reporting in local server
            @mail($email_to, $email_subject, $email_message, $headers);
        
        }
    } else {
        switch ($httpCode) {
            case 214:
                $msg = 'You are already subscribed.';
                break;
            default:
                $msg = 'Some problem occurred, please try again.';
                break;
        }
        $_SESSION['msg'] = '<p style="color: #EA4335">'.$msg.'</p>';
    }
}

header('location:../index.php');
?>