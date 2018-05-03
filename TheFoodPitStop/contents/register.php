<?php
/**
 * registration.php
 * 
 * content for the registration page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */

$userInfo = array();
$error_msg = "";
if (isset($_POST) && isset($_POST['firstName'])){
    $userInfo['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $userInfo['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $userInfo['plate'] = filter_var($_POST['plate'], FILTER_SANITIZE_STRING);
    $userInfo['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $userInfo['lastname'] = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $userInfo['firstname'] = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $userInfo['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    
    if (user_exist($userInfo['email']) <= 0){
        if(insert_user($userInfo) > 0){
            echo("<script>location.href = 'index.php?content=login';</script>");
        }else{
            global $lang_cookie;
            if ($lang_cookie == "FR"){
                $error_msg = "Échec d'enregistrer le compte!";
            }else{
                $error_msg = 'Fail to register account.  Try again!';
            }
        }
    }else{
        global $lang_cookie;
        if ($lang_cookie == "FR"){
            $error_msg = 'Adresse e-mail[' . $userInfo['email']. '] existe déjà dans notre système.';
        }else{
            $error_msg = 'Eamil addres[' . $userInfo['email'] . '] exist already in our system.';
        }        
    }
}


?>
<script>
    function check_validation(){
        var np = document.getElementById("password").value;
        var cp = document.getElementById("confirm_newpwd").value;
        
        //if (e.key == 'Backspace' && np != cp){
        if (np != cp){
            window.alert("Enter correct confirm password first!");
            document.getElementById("message").innerHTML = "Confirm password have to be same as password!";
            return false;
        }        
        
        var firstname = document.getElementById('firstName').value;
        if(/^[a-zA-Z ]+$/i.test(firstname) == false){
            document.getElementById('firstName').style.border = "2px solid red";
            document.getElementById("message").innerHTML = "First name cannot contain dizit!";
            return false;
        }
        var lastname = document.getElementById('lsstName').value;
        if(/^[a-zA-Z ]+$/i.test(lastname) == false){
            document.getElementById('lsstName').style.border = "2px solid red";
            document.getElementById("message").innerHTML = "Last name cannot contain dizit!";
            return false;
        }
        var username = document.getElementById('username').value;
        if(/^[a-zA-Z0-9]*$/.test(username) == false){
            document.getElementById('username').style.border = "2px solid red";
            document.getElementById("message").innerHTML = "Invalid username!";
            return false;
        }
    
    
        return true;
    }
    
    function check_confirm_password(e){
        document.getElementById("confirm_newpwd").style.border = '2px solid red';

        var np = document.getElementById("password").value;
        var cp = document.getElementById("confirm_newpwd").value;
        cp += e.key;
        
        //if (e.key == 'Backspace' && np != cp){
        if (np != cp){
            //document.getElementById('submit').disabled=true;
            return;
        }        
        else{
            document.getElementById("confirm_newpwd").style.border = '';
            //document.getElementById('submit').disabled=false;
        }
    }
    
</script>
<main class="page registration-page">
    <section class="clean-block clean-form dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container" style="margin-top:-38px;">
            <div class="block-heading">
                <h1 style="color:#608e3a;"> <?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Enregistrement';
                        else echo 'Registration';
                        ?></h1>
                <p id="message" name="message"><?php global $lang_cookie; 
                    if ($error_msg == ""){
                        if ($lang_cookie == "FR"){ echo "Formulaire d'inscription";}else{ echo 'Registration Form';}}
                        else{ echo $error_msg;}?>
                </p>
            </div>
            <form style="border-top:2px solid #608e3a;" action="index.php?content=register" method="POST" onsubmit="return check_validation();">
                <div class="form-group">
                    <label for="firstName"><?php  global $lang_cookie; if ($lang_cookie == "FR"){ echo "Prénom";}else {echo 'First Name';}?></label>
                    <input name="firstName" class="form-control item" type="text" id="firstName" required="require" <?php if (isset($userInfo['firstname'])){$value = $userInfo['firstname']; echo 'value="' .$value .'"';} ?>>
                </div>
                <div class="form-group">
                    <label for="lastName"><?php  global $lang_cookie;if ($lang_cookie == "FR"){ echo "Nom de famille";}else{ echo 'Last Name';}?></label>
                    <input name="lastName" class="form-control item" type="text" id="lastName" required="require" <?php if (isset($userInfo['lastname'])){$value = $userInfo['lastname']; echo 'value="'.$value.'"';} ?>>
                </div>
                <div class="form-group">
                    <label for="username"><?php  global $lang_cookie; if ($lang_cookie == "FR"){ echo "Nom d'utilisateur";}else{ echo 'Username';}?></label>
                    <input name="username" class="form-control item" type="text" id="username" required="require" <?php if (isset($userInfo['username'])){$value = $userInfo['username']; echo 'value="'.$value.'"';} ?>>
                </div>
                <div class="form-group">
                    <label for="password"><?php global $lang_cookie; if ($lang_cookie == "FR"){ echo "Mot de passe";}else{ echo 'Password';}?></label>
                    <input name="password" class="form-control item" type="password" id="password" required="require">
                </div>
                <div class="form-group">
                    <label for="confirm_newpwd">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Confirmez le mot de passe';}else{echo 'Confirm Password';}?>
                    </label>
                    <input name="confirm_newpwd" class="form-control item" type="password" id="confirm_newpwd" onkeydown="check_confirm_password(event);">
                </div>
                <div class="form-group">
                    <label for="email"><?php global $lang_cookie; if ($lang_cookie == "FR"){ echo "Courriel";}else{ echo 'Email';}?></label>
                    <input name="email" class="form-control item" type="email" id="email" required="require" <?php if (isset($userInfo['email'])){$value = $userInfo['email']; echo 'value="'.$value.'"';} ?>>
                </div>
                <div class="form-group">
                    <label for="phone"><?php global $lang_cookie;if ($lang_cookie == "FR"){ echo "Téléphone";}else{ echo 'Phone';}?></label>
                    <input name="phone" class="form-control item" type="text" id="phone" required="require" <?php if (isset($userInfo['phone'])){$value = $userInfo['phone']; echo 'value="'.$value.'"';} ?>>
                </div>
                <div class="form-group">
                    <label for="plate"><?php global $lang_cookie; if ($lang_cookie == "FR"){ echo "Plaque d'immatriculation";}else{ echo 'Car Plate Number';}?></label>
                    <input name="plate" class="form-control item" type="text" id="plate" required="require" <?php if (isset($userInfo['plate'])){$value = $userInfo['plate']; echo 'value="'.$value.'"';} ?>>
                </div>
                <button name="submit" class="btn btn-primary btn-block" type="submit" style="background-color:#608e3a;">
                    <?php global $lang_cookie;if ($lang_cookie == "FR"){ echo "Enregistrez";}else{ echo 'Sign Up';}?>
                </button>
            </form>
        </div>
    </section>
</main>

