<?php

/** 
 * LoadContent
 * Load the content
 * @param $default 
 */
function loadContent($where, $default=''){
    // get the content from the url
    // sanitize it for security reasons
    
    $content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
    $default = filter_var($default, FILTER_SANITIZE_STRING);
    // the there wasn't anything on the url, then use the default

    $content = (empty($content)) ? $default : $content;
    
    // if we have contnet, then get it and pass it back
    if($content){
        $html = include 'contents/' . $content . '.php';
        //$html = include $content . '.php';
        return $html;
    }
}

/** 
 * logging
 * Write message on log filename with date of today <yyyymmdd.txt>
 * The logging data format is <yyyymmdd_hh:mm:ss message>
 * @param $message 
 */
function logging($file='', $line='', $message=''){
    $filename = $_SERVER['DOCUMENT_ROOT'].'/TheFoodPitStop/Log/' . date("Ymd") . ".txt";
    $myfile = fopen($filename, "a") or die("Unable to open file!");
    fwrite($myfile, date("Ymd_H:i:s [") . $file . ":" . $line . "]" . $message . "\n");
}

/** 
 * active_menu
 * Get Active or UnActive on navigation bar
 * @param $where 
 */
function active_menu($where){
    $content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);
    
    if($where === 'home' && empty($content))    return 'active';
    else if ($where === $content)    return 'active';
    else return '';
}


/** 
 * cart_image
 * Get Shopping cart image depends on the state
 * @param $where 
 */
function cart_image($where){
    $content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);
    
    if ($where === $content)    return 'assets/img/cart2.png';
    else    return 'assets/img/cart2_gray.png';
}


/** 
 * get_product_image_src
 * Get Full Path of the image using category, product_id and img_type
 * @param $category, $product_id,  $img_type
 */
function get_product_image_src($category, $product_id, $img_type){
    logging("images/" . $category . "/" . $product_id . "." . $img_type);
    return "images/" . $category . "/" . $product_id . "." . $img_type;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function get_url_string_for_login(){
    $url_string = "";
    //login=fail&action=logout
    if (isset($_GET['login']))
        $url_string .= "login=" . $_GET['login'];
    //action=logout
    if (isset($_GET['action'])){
        if ($url_string == "")
            $url_string .= "&";
        $url_string .= "action=" . $_GET['action'];
    }          
    //msg=$fmsg&useremail=$myusername
    if (isset($_GET['msg'])){
        if ($url_string == "")
            $url_string .= "&";
        $url_string .= "msg=" . $_GET['msg'];
    }               
    if (isset($_GET['useremail'])){
        if ($url_string == "")
            $url_string .= "&";
        $url_string .= "useremail=" . $_GET['useremail'];
    }      
    
    return $url_string;
}

function get_url_string_for_product()
{
    $url_string = "";
    //page=1&category=&brand=&searchkey=
    if (isset($_GET['page'])){
        $url_string .= "page=" . $_GET['page'];
    }
    //action=logout
    if (isset($_GET['category'])){
        if ($url_string == "")
            $url_string .= "&";
        $url_string .= "category=" . $_GET['category'];
    }
    return $url_string;            
}

function get_url_string_for_payment()
{
    $url_string = "";
    //pickup_date=" + pickup_date + "&pickup_time=" + pickup_time
    if (isset($_GET['pickup_date'])){
        $url_string .= "pickup_date=" . $_GET['pickup_date'];
    }
    //action=logout
    if (isset($_GET['pickup_time'])){
        if ($url_string == "")
            $url_string .= "&";
        $url_string .= "pickup_time=" . $_GET['pickup_time'];
    }
    
    return $url_string;            
}

function get_url_string_for_language($content){
    $url_string = "";
    switch($content){
        case 'login':
            $url_string = get_url_string_for_login();
            break;
        case 'product' :
            $url_string = get_url_string_for_product();
            break;
        case 'payment' :
            $url_string = get_url_string_for_payment();
            break;
        case 'home': case 'about_us' : case 'contact_us' :
            break;
    }
    
    return $url_string;
}

function change_language($new_lang){
    $cookie = isset($_COOKIE['pitstop_language_cookie']) ? $_COOKIE['pitstop_language_cookie'] : "";
    $cookie = stripslashes($cookie);
    $old_lang = json_decode($cookie, true);
    
    if ($old_lang == $new_lang){
        return;
    }
    
    unset($old_lang);

    // delete cookie value
    setcookie("pitstop_language_cookie", "", time()-3600);
    
    $json = json_encode($new_lang, true);
    setcookie("pitstop_language_cookie", $json, time() + (86400 * 30), '/'); // 86400 = 1 day
    $_COOKIE['pitstop_language_cookie'] = $json;
    
    header("Refresh:0");
    die();
}