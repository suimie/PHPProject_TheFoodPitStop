<?php

/** 
 * LoadContent
 * Load the content
 * @param $default 
 */
function load_catalog_product_div($where, $default=''){
    // get the content from the url
    // sanitize it for security reasons
    
    $content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
    $default = filter_var($default, FILTER_SANITIZE_STRING);
    // the there wasn't anything on the url, then use the default

    $content = (empty($content)) ? $default : $content;
    
    // if we have contnet, then get it and pass it back
    if($content){
        $html = include 'contents/' . $content . '.php';
        return $html;
    }
}

function get_array_from_url($which){
    $sidebar_which = filter_input(INPUT_GET, $which, FILTER_SANITIZE_STRING);
    
    $sidebar_which_arr = explode(" ", $sidebar_which); 
   
   return $sidebar_which_arr;
}

function get_url_from_array($arr){
    $urlstr = "";
    foreach($arr as $item){
        if($item !== "")
            if($urlstr !== "")
                $urlstr .= "+";
            $urlstr .= $item;
    }
    
    return $urlstr;
}

function get_count_2d_array($arr){
    $count = 0;
    if ($arr == null)   return 0;
    
    foreach($arr as $item){
        $count++;
    }
    
    return $count;
}

function check_cc($cc, $extra_check = false){
    $cards = array(
        "visa" => "(4\d{12}(?:\d{3})?)",
        "amex" => "(3[47]\d{13})",
        "jcb" => "(35[2-8][89]\d\d\d{10})",
        "maestro" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
        "solo" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
        "mastercard" => "(5[1-5]\d{14})",
        "switch" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
    );
    $names = array("Visa", "American Express", "JCB", "Maestro", "Solo", "Mastercard", "Switch");
    $matches = array();
    $pattern = "#^(?:".implode("|", $cards).")$#";
    $result = preg_match($pattern, str_replace(" ", "", $cc), $matches);
    if($extra_check && $result > 0){
        $result = (validatecard($cc))?1:0;
    }
    return ($result>0)?$names[sizeof($matches)-2]:false;
}
