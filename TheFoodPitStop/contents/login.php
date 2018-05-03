

<?php
/**
 * login.php
 * 
 * content for the login page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */
if (isset($_GET['registered']) && $_GET['registered'] == 'ok'){
    echo '<script language="javascript">';
    echo 'alert("You are registered on our system successfully!\nLogin First and Enjoy shopping!")';  //not showing an alert box.
    echo '</script>';
}
?>


<main class="page login-page">
    <section class="clean-block clean-form dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">
                <h1 style="color:#608e3a;"> <?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Ouvrir une session';
                        else echo 'Log in';
                        ?></h1>
                <p><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Veuillez entrer votre nom d'utilisateur et mot de passe.";
                        else echo 'Please log in with your username and password.';
                        ?></p>
                <p> <?php 
                $login_fail = 0;
                if (isset($_GET['msg'])){
                    $login_fail = 1;
                    echo $_GET['msg'];
                    
                    /*
                    $cookie = $_COOKIE['pitstop_user_login_cookie'];
        
                    $cookie = stripslashes($cookie);
                    $loggedin_user = json_decode($cookie, true);

                    // remove the item from the array
                    unset($loggedin_user);

                    // delete cookie value
                    unset($_COOKIE["pitstop_user_login_cookie"]);

                    // empty value and expiration one hour before
                    setcookie("pitstop_cart_items_cookie", "", time() - 3600);

                    // enter new value
                    $json = json_encode("", true);
                    setcookie("pitstop_cart_items_cookie", $json, time() + (86400 * 30), '/'); // 86400 = 1 day
                    $_COOKIE['pitstop_cart_items_cookie']=$json;
                     * 
                     */
                }
                ?> </p>
            </div>
            <form style="border-top:2px solid #608e3a" method = "post"  action="includes/check_login1.php">
                <div class="form-group"><label for="email"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Courriel';
                        else echo 'Email';
                        ?></label><input class="form-control item" type="text" placeholder="<?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'moi@exemple.com';
                        else echo 'example@domain.com';
                        ?>" 
                    <?php 
                    /*if($login_fail && isset($_GET['useremail'])){
                        echo 'value="' . $_GET['useremail'] . '"';
                    }*/
                    ?> value="<?php 
                                if(isset($_COOKIE["pitstop_user_login_cookie"])) { 
                                    $cookie = $_COOKIE['pitstop_user_login_cookie'];
                                    $cookie = stripslashes($cookie);
                                    $logininfo = json_decode($cookie, true);
                                    echo $logininfo['username'];
                                } 
                                ?>" id="email" name="email" required>
                </div>
                <div class="form-group"><label for="password"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Mot de passe';
                        else echo 'Password';
                        ?></label><input class="form-control" type="password" id="password" name="password" 
                    value="<?php 
                    if(isset($_COOKIE["pitstop_user_login_cookie"])) { 
                                    $cookie = $_COOKIE['pitstop_user_login_cookie'];
                                    $cookie = stripslashes($cookie);
                                    $logininfo = json_decode($cookie, true);
                                    echo $logininfo['password'];
                    }  
                    ?>" required></div>
                <div class="form-group">
                    <div class="form-check"><input class="form-check-input" type="checkbox"  name="remember_me" id="remember_me" 
                        <?php 
                            if(isset($_COOKIE["pitstop_user_login_cookie"])) {  
                                $cookie = $_COOKIE['pitstop_user_login_cookie'];
                                $cookie = stripslashes($cookie);
                                $logininfo = json_decode($cookie, true);
                                if ($logininfo['username'] != "" && $logininfo['password'] != "")
                                    echo 'checked=checked';                                  
                            } 
                        ?>><label class="form-check-label" for="checkbox"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Se souvernir';
                        else echo 'Remember me';
                        ?></label></div>
                    <div style="text-align:right;"><a href="index.php?content=register"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Créer un nouveau compte';
                        else echo 'Create new account';
                        ?></a></div>
                </div><button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color:#608e3a;"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Connecter';
                        else echo 'Log In';
                        ?></button></form>
        </div>
    </section>
</main>