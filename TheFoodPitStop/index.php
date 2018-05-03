


<?php
/**
 * index.php
 * 
 * Main content
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 * 
 */
if (isset($_GET['content']) && $_GET['content'] == "complete_payment"){
    $cookie = isset($_COOKIE['pitstop_cart_items_cookie']) ? $_COOKIE['pitstop_cart_items_cookie'] : "";
    $cookie = stripslashes($cookie);
    $saved_cart_items = json_decode($cookie, true);

    if(is_array($saved_cart_items) && count($saved_cart_items) > 0) {
        foreach($saved_cart_items as $key => $value){ 
            unset($saved_cart_items[$key]);
            unset($_COOKIE["pitstop_cart_items_cookie"]);
            setcookie("pitstop_cart_items_cookie", "", time() - 3600);
            $json = json_encode($saved_cart_items, true);
            setcookie("pitstop_cart_items_cookie", $json, time() + (86400 * 30), '/'); // 86400 = 1 day
            $_COOKIE['pitstop_cart_items_cookie']=$json; 
        }
    }
}
$login = "";
session_start();

// Suim added from here
$lang_cookie = "";
if (isset($_COOKIE['pitstop_language']))
    $lang_cookie = $_COOKIE['pitstop_language'];


$login_cookie = "";
if (isset($_COOKIE['pitstop_login_user_cookie']))
{
    $login_cookie = $_COOKIE['pitstop_user_login_cookie'];
    session_start();
    $login = 'succ';
}

// to here

if (isset($_GET['action']) && $_GET['action'] == 'logout')
{
    unset($_SESSION);
    session_destroy();
    $login = 'out';
}/* Suim made it comment
 * else if(isset($_GET['login']) && $_GET['login'] == 'succ'){
  session_start();
  $login = 'succ';
  } */

require_once $_SERVER['DOCUMENT_ROOT'] . '/TheFoodPitStop/init.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--meta charset="UTF-8"-->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Home | The Food Pit Stop</title>
        <link rel="icon" type="image/png" href="assets/img/Food_Pit_Stop_35.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
        <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-115.css">
        <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-115.css">
        <link rel="stylesheet" href="assets/css/Bold-BS4-Footer-Big-Logo.css">
        <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
        <link rel="stylesheet" href="assets/css/Hover-Product.css">
        <link rel="stylesheet" href="assets/css/Hover-Product.css">
        <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
        <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
        <link rel="stylesheet" href="assets/css/Navigation-e-commerce.css">
        <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">    
        <!--<script type="text/javascript" src="scripts/functions_for_catalog.js"></script>-->
        <script>
            function search_item() {
                var search_key_str = document.getElementById("search_key").value;
                window.location.href = 'index.php?content=catalog_page&page=1&category=&brand=&searchkey=' + search_key_str;
            }

            function process_keyup(e) {
                if (e.keyCode == 13) {
                    var key_value = document.getElementById("search_key").value;
                    window.location.href = 'index.php?content=catalog_page&page=1&category=&brand=&searchkey=' + key_value;

                    return false;
                }
                return true;
            }


            function processCookie(lang) {
                var tmp = "pitstop_language=" + lang;
                document.cookie = tmp;
                location.reload();
            }
        </script>
        <style>
            .lang {
                cursor:pointer;
            }
        </style>
    </head>

    <body>
        <?php
        // put your code here
        ?>
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar"  style="max-width:100%;">
            <div class="container" style="max-width:90%;">
                <a class="navbar-brand logo" href="index.php?content=home" >
                    <img src="assets/img/Food_Pit_Stop.png" style="width:110px;margin-right:10px ;">
                    THE FOOD PIT STOP
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                    <span class="navbar-toggler-icon">
                        <span class="sr-only">Toggle navigation</span> 
                    </span>
                </button>
                <div class="collapse navbar-collapse"
                     id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo active_menu('home'); ?>" href="index.php?content=home" 
                                <?php global $lang_cookie;if ($lang_cookie == "FR " || "EN"){echo 'style="font-size:16px;"';}?>>
                                <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'ACCCUEIL';}else{echo 'HOME';}?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo active_menu('catalog_page'); ?>" 
                               href="index.php?content=catalog_page&category=&brand=&page=1" 
                                   <?php global $lang_cookie;if ($lang_cookie == "FR"|| "EN"){echo 'style="font-size:16px;"';}?>>
                                <?php
                                global $lang_cookie;
                                if ($lang_cookie == "FR")
                                    echo 'PRODUITS';
                                else
                                    echo 'PRODUCTS';
                                ?>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['username'])) : ?>
                            <!-- Suim added action=logout -->
                            <li class="dropdown">
                                <a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" 
                                   href="index.php?content=catalog_page" <?php global $lang_cookie;if ($lang_cookie == "FR" || "EN"){echo 'style="font-size:16px;"';}?>>
                                    <?php echo substr($_SESSION['username'], 0, 11);
                                    ?>
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" role="presentation" href="index.php?content=login&login=fail&action=logout">
                                        <?php
                                        global $lang_cookie;
                                        if ($lang_cookie == "FR")
                                        {
                                            echo "Déconnexion";
                                        } else
                                        {
                                            echo "Sign Out";
                                        }
                                        ?>
                                    </a>
                                    <a class="dropdown-item" role="presentation" href="index.php?content=user_profile">
                                        <?php
                                        global $lang_cookie;
                                        if ($lang_cookie == "FR")
                                        {
                                            echo "Profil";
                                        } else
                                        {
                                            echo "Profile";
                                        }
                                        ?>
                                    </a>
                                </div>
                            <?php else : ?>
                            <li class="nav-item" role="presentation">
                                <a id="sign_in_out" class="nav-link <?php echo active_menu('login'); ?>" 
                                   href="index.php?content=login&action=login" 
                                       <?php global $lang_cookie;if ($lang_cookie == "FR"|| "EN"){echo 'style="font-size:16px;"';}?>>
                                    <?php
                                    global $lang_cookie;
                                    if ($lang_cookie == "FR")
                                        echo 'SE <br/>CONNECTER';
                                    else
                                        echo 'SIGN IN';
                                    ?>                   
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation" style=" margin-left:5px; ">
                            <a class="nav-link <?php echo active_menu('about_us'); ?>" 
                               href="index.php?content=about_us"
                                <?php global $lang_cookie;if ($lang_cookie == "FR" || "EN"){echo 'style="font-size:16px;"';}?>>
                                <?php
                                global $lang_cookie;
                                if ($lang_cookie == "FR")
                                    echo ' À propos<br/>de nous';
                                else
                                    echo 'About Us';
                                ?>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo active_menu('contact_us'); ?>" href="index.php?content=contact_us"
                                <?php global $lang_cookie;if ($lang_cookie == "FR"|| "EN"){echo 'style="font-size:16px;"';}?>> 
                                <?php
                                global $lang_cookie;
                                if ($lang_cookie == "FR")
                                    echo 'Contactez<br/>Nous';
                                else
                                    echo 'Contact Us';
                                ?>
                            </a>
                        </li>
                    </ul>
                    <span class="navbar-text" style="padding-right:12px;">
                        <span onclick="processCookie('EN');" class="lang" 
                              style="<?php global $lang_cookie;if ($lang_cookie !== "FR"){echo 'font-size:14px;font-weight:bold;';}else{echo 'font-size:14px;font-weight:normal;';}?> ">EN</span>
                        | 
                        <span onclick="processCookie('FR');" class="lang" 
                              style="<?php global $lang_cookie;if ($lang_cookie === "FR"){echo 'font-size:14px;font-weight:bold;';}else{echo 'font-size:14px;font-weight:normal;';}?> ">FR</span>
                    </span>
                    <span class="navbar-text">
                        <a href="index.php?content=shopping_cart">
                            <img src="<?php echo cart_image('shopping_cart'); ?>" onmouseover="this.src = 'assets/img/cart2.png';" onmouseout="this.src = '<?php echo cart_image('shopping_cart'); ?>';" width="40px" height="40px">
                        </a>
                    </span>
                    <span class="navbar-text" style="font-family:Montserrat, sans-serif;padding-bottom:14px;font-weight:bold;color:red">
                        <?php
                        // count items in the cart
                        $cookie = isset($_COOKIE['pitstop_cart_items_cookie']) ? $_COOKIE['pitstop_cart_items_cookie'] : "";
                        if ($cookie == "")
                            $cart_count = 0;
                        else
                        {
                            $cookie = stripslashes($cookie);
                            $saved_cart_items = json_decode($cookie, true);
                            $cart_count = count($saved_cart_items);
                        }
                        echo $cart_count;
                        ?>
                    </span>
                </div>
            </div>
        </nav>
        <form class="search-form" style="margin-top:162px;">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-search">

                        </i>
                    </span>
                </div>
                <input id="search_key" class="form-control" type="text" placeholder=" <?php
                global $lang_cookie;
                if ($lang_cookie == "FR")
                    echo 'Je cherche...';
                else
                    echo 'I am looking for..';
                ?>" style="margin-right:5px;border-right:1px solid #b4c1cb" onkeypress="return process_keyup(event);">
                <div class="input-group-append">
                    <button class="btn btn-light" type="button" onclick="search_item();"> 
                        <?php
                        global $lang_cookie;
                        if ($lang_cookie == "FR")
                            echo 'Recherche';
                        else
                            echo 'Search';
                        ?> 
                    </button>
                </div>
            </div>
        </form>

        <!-- start : main area -->
        <?php
        loadContent('content', 'home');
        ?>
        <!-- end : main area -->

        <footer id="myFooter" style="background-color:#608e3a;">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="index.php?content=home">
                            <img src="assets/img/Food_Pit_Stop.png" style="width:150px;">
                        </a>
                        <p class="mb-1" style="color:rgb(210,210,210);">
                            <i class="fa fa-map-marker fa-fw">
                            </i>&nbsp;Main Road - Tamarin - Canada
                        </p>
                        <p class="mb-1" style="color:rgb(210,210,210);">
                            <i class="fa fa-phone fa-fw">

                            </i>&nbsp;+1 800 137 56 78</p>
                        <p class="mb-1">
                            <i class="fa fa-envelope fa-fw">

                            </i>&nbsp;<a href="mailto:contact@company.com" class="text-dark" style="color:rgb(210,210,210);">contact@company.com</a>
                        </p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <h5>
                            <?php
                            global $lang_cookie;
                            if ($lang_cookie == "FR")
                                echo 'Pour commencer';
                            else
                                echo 'Get started';
                            ?>
                        </h5>
                        <ul>
                            <li>
                                <a href="index.php?content=home">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Accueil';}else{echo 'Home';}?>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Téléchargements';}else{echo 'Downloads';}?>
                                    <br>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?content=registration">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Enregistrez-vous';}else{echo 'Sign Up';}?>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php
                                    global $lang_cookie;
                                    if ($lang_cookie == "FR")
                                        echo 'Autres liens';
                                    else
                                        echo 'Other Links';
                                    ?>
                                </a>
                            </li>
                        </ul>
                        <?php if (isset($_SESSION['myemail']) && isAdmin($_SESSION['myemail']) == '1') : ?>
                            <h5>Admin</h5>
                            <ul>
                                <li style="font-weight:bold;">
                                    <a href="index.php?content=manage_products">
                                        <?php
                                        global $lang_cookie;
                                        if ($lang_cookie == "FR")
                                            echo 'Gérez les produits';
                                        else
                                            echo 'Manage Products';
                                        ?>
                                        <br>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <h5>
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Notre entreprise';}else{echo 'Our Company';}?>
                        </h5>
                        <ul>

                            <li>
                                <a href="index.php?content=about_us">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'À propos de nous';}else{echo 'About Us';}?>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Information sur notre entreprise';}else{echo 'Company Information';}?>
                                    <br>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Revues ';}else{echo 'Reviews';}?>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?content=contact_us">Contacts</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <h5>Support</h5>
                        <ul>
                            <li>
                                <a href="#">
                                    <?php
                                    global $lang_cookie;
                                    if ($lang_cookie == "FR")
                                        echo 'Questions et réponses ';
                                    else
                                        echo 'FAQ';
                                    ?>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php
                                    global $lang_cookie;
                                    if ($lang_cookie == "FR")
                                        echo 'Centre de service';
                                    else
                                        echo 'Help Desk';
                                    ?>
                                    <br>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php
                                    global $lang_cookie;
                                    if ($lang_cookie == "FR")
                                        echo 'Forums';
                                    else
                                        echo 'Forums';
                                    ?>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php
                                    global $lang_cookie;
                                    if ($lang_cookie == "FR")
                                        echo 'Liens externes';
                                    else
                                        echo 'External Links';
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 social-networks">
                        <div>

                        </div>
                        <a href="http://www.facebook.com" class="facebook">
                            <i class="fa fa-facebook">

                            </i>
                        </a>
                        <a href="http://www.twitter.com" class="twitter">
                            <i class="fa fa-twitter">

                            </i>
                        </a>
                        <a href="http://www.google.com" class="google">
                            <i class="fa fa-google-plus">

                            </i>
                        </a>
                       
                        <button class="btn btn-primary" type="button" style="margin-top:20px;background-color:rgba(235,227,221,0.47);">
                            <?php
                            global $lang_cookie;
                            if ($lang_cookie == "FR")
                                echo 'Contactez-nous';
                            else
                                echo 'Contact us';
                            ?>
                        </button>
                    </div>
                </div>
                <div class="row footer-copyright" style="background-color:#608e3a;">
                    <div class="col" style="background-color:#608e3a;">
                        <p>
                            <?php
                            global $lang_cookie;
                            if ($lang_cookie == "FR")
                                echo '© 2018 Copyright  ~ Conçu par';
                            else
                                echo '© 2018 Copyright ~ Designed By';
                            ?>&nbsp;<a href="#">
                                <?php
                                global $lang_cookie;
                                if ($lang_cookie == "FR")
                                    echo 'Anita, Suim et Valini';
                                else
                                    echo 'Anita, Suim & Valini';
                                ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/Hover-Product.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="assets/js/bs-animation.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    </body>

</html>
