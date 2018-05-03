<?php
/**
 * user_profile.php
 * 
 * content for detail information of user
 * User can change password and plate number or make deactivate the account if want.
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
    $userInfo['email'] = $_SESSION['myemail'];
    $userInfo['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $userInfo['newpassword'] = filter_var($_POST['newpwd'], FILTER_SANITIZE_STRING);
    $userInfo['plate'] = filter_var($_POST['plate'], FILTER_SANITIZE_STRING);
    $userInfo['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $userInfo['lastname'] = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $userInfo['firstname'] = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $userInfo['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $isDelete = filter_var($_POST['delete_acc'], FILTER_SANITIZE_STRING);
    
    if(user_ok($userInfo['email'], $userInfo['password'])){
        if ($isDelete === 'true'){
            if(delete_account($userInfo['email']) > 0){
                echo("<script>location.href = 'index.php?content=login&login=fail&action=logout';</script>");
            }else{
                global $lang_cookie;
                if ($lang_cookie == "FR"){
                    $error_msg = 'Échec de la désactivation du compte Réessayer!';
                }else{
                    $error_msg = 'Fail to deactivate account.  Try again!';
                }
            }
        }
        elseif(update_user_profile($userInfo) > 0){
            $userInfo = null;
        }else{
                global $lang_cookie;
                if ($lang_cookie == "FR"){
                    $error_msg = 'Échec de la mise à jour Il y avait probablement des valeurs invalides!';
                }else{
                    $error_msg = 'Fail to update. There were invalid values probably!';
                }
        }
    }else{
        global $lang_cookie;
        if ($lang_cookie == "FR"){
            $error_msg = 'Mauvais mot de passe! Réessayer!';
        }else{
            $error_msg = 'Wrong password! Try again!';
        }
    }
   
}

if (isset($_GET)){
    if (isset($_SESSION['myemail'])){
        $useremail = $_SESSION['myemail'];
        if (isset($_GET['deactivate_account'])){
            if(delete_account($useremail) > 0){
                header("location:../index.php?content=login&login=fail&action=logout");
            }else{
                $error_msg = "Fail to deactivate account!";
                $userInfo = get_user_profile($useremail);
            }
        }else{
            $userInfo = get_user_profile($useremail);
        }
    }else{
        echo '<script>window.alert("Invalid url");window.history.back();</script>';
    }
}
?>
<script>
    function want_to_change_pwd(){
        e1 = document.getElementById('newpwd_div');
        e2 = document.getElementById('confirm_newpwd_div');
        b = document.getElementById('submit');

        if (e1.style.display === "none") {
            e1.style.display = "block";
            e2.style.display = "block";
            if(e1.value != e2.value)
                b.disabled = true;
        } else {
            e1.style.display = "none";
            e2.style.display = "none";
            b.disabled = false;
        }
    }
    
    function check_confirm_password(e){
        document.getElementById("confirm_newpwd").style.border = '2px solid red';

        var np = document.getElementById("newpwd").value;
        var cp = document.getElementById("confirm_newpwd").value;
        cp += e.key;
        
        //if (e.key == 'Backspace' && np != cp){
        if (np != cp){
            document.getElementById('submit').disabled=true;
            return;
        }        
        else{
            document.getElementById("confirm_newpwd").style.border = '';
            document.getElementById('submit').disabled=false;
        }
    }
    
    function deactivate_account(btn){
        if (btn === '1'){   // deactivate
            document.getElementById('delete_acc').value = "true";
        }else{              // update
            document.getElementById('delete_acc').value = "false";
        }
        document.getElementById("update_form").submit();
    }
</script>
<main class="page registration-page">
    <section class="clean-block clean-form dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container" style="margin-top:-38px;">
            <div class="block-heading">
                <h1 style="color:#608e3a;">
                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Profil de l'utilisateur";}else{echo "User Profile";}?>
                </h1>
                <p id="top_msg" name="top_msg">
                    <?php
                    if (isset($_POST) && isset($_POST['firstName']) && $error_msg != ""){     // fail to update
                        echo $error_msg;
                    }else{
                        global $lang_cookie;
                        if ($lang_cookie == "FR"){echo 'Vous pouvez changer votre mot de passe et votre numéro de plaque, si vous le souhaitez.';
                        }else{ echo 'You can change your password and plate number, if you want.';}
                    }
                    ?>
                </p>
            </div>
            <form id="update_form" name="update_form" style="border-top:2px solid #608e3a;" action="index.php?content=user_profile" method="POST">
                <input type="text" name="delete_acc" id="delete_acc" value="false" hidden="hidden">
                <div class="form-group col-md-12">
                    <label for="email">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Courriel';}else{echo 'Email';}?>
                    </label>
                    <input name="email" class="form-control item" type="text" id="email" disabled="true"
                        <?php if(isset($userInfo) && isset($userInfo[0]['email'])) echo 'value="' . $userInfo[0]['email'] . '"';?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="fname">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Prénom';}else{echo 'First Name';}?>
                    </label>
                    <input name="firstName" class="form-control item" type="text" id="fname" required="required"
                        <?php if(isset($userInfo) && isset($userInfo[0]['firstName'])) echo 'value="' . $userInfo[0]['firstName'] . '"';?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="lname">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Nom de famille';}else{echo 'Last Name';}?>
                    </label>
                    <input name="lastName" class="form-control item" type="text" id="lname" required="required"
                        <?php if(isset($userInfo) && isset($userInfo[0]['lastName'])) echo 'value="' . $userInfo[0]['lastName'] . '"';?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="name">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Nom d'utilisateur";}else{echo 'Username';}?>
                    </label>
                    <input name="username" class="form-control item" type="text" id="name" required="required"
                        <?php if(isset($userInfo) && isset($userInfo[0]['username'])) echo 'value="' . $userInfo[0]['username'] . '"';?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="phone">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Téléphone';}else{echo 'Phone';}?>
                    </label>
                    <input name="phone" class="form-control item" type="text" id="phone" required="required"
                        <?php if(isset($userInfo) && isset($userInfo[0]['phone'])) echo 'value="' . $userInfo[0]['phone'] . '"';?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="plate">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Numéro de plaque de voiture';}else{echo 'Car Plate Number';}?>
                    </label>
                    <input name="plate" class="form-control item" type="text" id="plate" required="required"
                        <?php if(isset($userInfo) && isset($userInfo[0]['plateNo'])) echo 'value="' . $userInfo[0]['plateNo'] . '"';?>>
                </div>
                    <div class="form-group col-md-12">
                       <label for="password">
                           <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Mot de passe';}else{echo 'Password';}?>
                       </label>
                       <input name="password" class="form-control item" type="password" id="password"  required="required">
                           <!--<?php //if(isset($userInfo) && isset($userInfo[0]['password'])) echo 'value="' . $userInfo[0]['password'] . '"';?>-->
                   </div>
                <div class='form-group col-md-12'>
                    <p style="cursor:pointer;color:blue;" onclick="return want_to_change_pwd();">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Voulez-vous changer le mot de passe';}else{echo 'Want to change password';}?>
                    </p> 
                </div>
                <div class="form-group col-md-12" id='newpwd_div' name='newpwd' style="display: none;">
                    <label for="newpwd">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Nouveau mot de passe';}else{echo 'New Password';}?>
                    </label>
                    <input name="newpwd" class="form-control item" type="password" id="newpwd" onkeydown="check_confirm_password(event);">
                </div>
                <div class="form-group col-md-12" id='confirm_newpwd_div' name='confirm_newpwd' style="display: none;">
                    <label for="confirm_newpwd">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Confirmez le mot de passe';}else{echo 'Confirm Password';}?>
                    </label>
                    <input name="confirm_newpwd" class="form-control item" type="password" id="confirm_newpwd" onkeydown="check_confirm_password(event);">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <button name="deactivate" id="deactivate" class="btn btn-primary btn-block" type="button" style="background-color:#608e3a;border:2px solid #608e3a;" onclick="deactivate_account('1');">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Désactiver le compte';}else{echo 'Deactivate Account';}?>
                        </button>
                    </div>
                    <div class="form-group col-md-6">
                        <button name="save" id="save" class="btn btn-primary btn-block" type="button" style="background-color:#608e3a;border:2px solid #608e3a;"  onclick="deactivate_account('2');">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Enregistrer';}else{echo 'Save';}?>
                        </button>
                    </div>        
                </div>
            </form>
        </div>
    </section>
</main>
