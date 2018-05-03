<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/TheFoodPitStop/init.php';
$fmsg = "";
if (isset($_POST['submit'])) {

    if (isset($_POST['email']) and isset($_POST['password'])) {


        $myusername = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (filter_var($myusername, FILTER_VALIDATE_EMAIL)) {
            $myusername = $myusername;
        } else {
            //if username is not an email 
            $fmsg = "Invalid Login Credentials.";
            header("location:../index.php?content=login&msg=$fmsg&useremails=$myusername");
        }

        //$mypassword = ($_POST['password']);
        $mypassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $conn = connect_db();
        if ($conn === null) {
            return null;
        }
        $sql = "SELECT * FROM users WHERE email='$myusername'";
        logging(__FILE__ . ":" . __LINE__ . $sql);
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
        //test
        $hashedPwdCheck = "";
        if ($count == 1) {
            if ($row = mysqli_fetch_assoc($result)) {
                //Dehashing the password
                if (!(password_verify($mypassword, $row['password']))) {
                    //$hashedPwdCheck= password_verify($mypassword, $row['password']);
                    //$hashedPwdCheck = $row['password'];
                    //if (!($hashedPwdCheck == $mypassword)) {
                    $fmsg = "Invalid Login Credentials.";
                    header("location:../index.php?content=login&msg=$fmsg&useremail=$myusername");
                    exit();
                    //} elseif ($hashedPwdCheck == $mypassword) {
                } else {
                    //Log in the user here
                    
                    session_start();

                    $_SESSION['myid'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['myisAdmin'] = $row['isAdmin'];
                    $_SESSION['myfirstName'] = $row['firstName'];
                    $_SESSION['myemail'] = $row['email'];
                    $_SESSION['myphone'] = $row['phone'];
                    $_SESSION['myplateNo'] = $row['plateNo'];


                   if(!empty($_POST["remember_me"])) {
                        // put item to cookie
                        $logininfo = array();
                        $logininfo['username'] = $myusername;
                        $logininfo['password'] = $mypassword;

                        $json = json_encode($logininfo, true);
                        setcookie("pitstop_user_login_cookie", $json, time() + (86400 * 30), '/'); // 86400 = 1 day
                        //$_COOKIE['pitstop_user_login_cookie'] = $json;
                    
                       
                        //setcookie ("email_cookie",$myusername,time()+ (10 * 365 * 24 * 60 * 60));
                        //setcookie ("password-cookie", $mypassword ,time()+ (10 * 365 * 24 * 60 * 60));
                    } else {
                        $logininfo = array();
                        $logininfo['username'] = '';
                        $logininfo['password'] = '';
                        $json = json_encode($logininfo, true);
                        setcookie("pitstop_user_login_cookie", $json, time() + (86400 * 30), '/'); // 86400 = 1 day
                        //$_COOKIE['pitstop_user_login_cookie'] = $json;
                    }
                    
                    header("location:../index.php?content=home&login=succ");
                    exit();
                }
            }
        } else {
            unset($_SESSION);
            session_destroy();
            $fmsg = "Invalid Login Credentials.";
            header("location:../index.php?content=login&msg=$fmsg&useremails=$myusername");
        }
    }
}
?>


