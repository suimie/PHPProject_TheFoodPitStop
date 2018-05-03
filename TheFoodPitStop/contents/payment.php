<?php
/**
 * payment.php
 * 
 * content for the payment page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */

//^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)
//^(0[1-9]|1[0-2])$
/* 
(?(DEFINE)
 (       (?<sep> [ -]?)
    )
    (?<!\d)(?:
      \d{4} (?&sep) \d{4} (?&sep) \d{4} (?&sep) \d{4}               # 16 digits
    | \d{3} (?&sep) \d{3} (?&sep) \d{3} (?&sep) \d (?&sep) \d{3}    # 13 digits
    | \d{4} (?&sep) \d{6} (?&sep) \d{4}                             # 14 digits
    | \d{4} (?&sep) \d{6} (?&sep) \d{5}                             # 15 digit card
    )(?!\d)
 */
//^[0-9]{3,4}$
$name = $email = $gender = $comment = $website = "";
$invalid_info = "no";
$pickup_date = "";
$pickup_time = "";
$error_msg = "";
$total_amount = "0";
$payment_info = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    require_once $_SERVER['DOCUMENT_ROOT'].'/TheFoodPitStop/init.php';
    $total_amount = filter_input(INPUT_POST, 'total_amount', FILTER_SANITIZE_STRING);
    $payment_info['card_holder'] = filter_input(INPUT_POST, 'card-holder', FILTER_SANITIZE_STRING);
    $payment_info['expire_month'] = filter_input(INPUT_POST, 'expire_month', FILTER_SANITIZE_STRING);
    $payment_info['expire_year'] = filter_input(INPUT_POST, 'expire_year', FILTER_SANITIZE_STRING);
    $payment_info['card_number'] = filter_input(INPUT_POST, 'card-number', FILTER_SANITIZE_STRING);
    $payment_info['cvc'] = filter_input(INPUT_POST, 'cvc', FILTER_SANITIZE_STRING);
    $pickup_date = filter_input(INPUT_POST, 'pickup_date', FILTER_SANITIZE_STRING);
    $pickup_time = filter_input(INPUT_POST, 'pickup_time', FILTER_SANITIZE_STRING);
    
    if(!preg_match("/^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/", $payment_info['card_holder'])){
        //header("location:../index.php?content=payment&invalid_info=card-holder&pickup_date=$pickup_date&pickup_time=$pickup_time");
        $invalid_info = 'card-holder';
        global $lang_cookie;
        if ($lang_cookie == "FR"){
            $error_msg = "Le nom du titulaire de la carte n'est pas valide. Réessayer!";
        }else{
            $error_msg = 'Invalid card holder name.  Try again!';
        }
    }else if(!preg_match("/^(0[1-9]|1[0-2])$/", $payment_info['expire_month'])){
//        header("location:../index.php?content=payment&invalid_info=expire_month");
        $invalid_info = 'expire_month';
        global $lang_cookie;
        if ($lang_cookie == "FR"){
            $error_msg = "Mois d'expiration invalide. Réessayer!";
        }else{
            $error_msg = 'Invalid expire month.  Try again!';
        }
    }else if(!preg_match("/^([0-9]{2})$/", $payment_info['expire_year'])){
        //header("location:../index.php?content=payment&invalid_info=expire_year");
        $invalid_info = 'expire_year';
        global $lang_cookie;
        if ($lang_cookie == "FR"){
            $error_msg = "L'année d'expiration n'est pas valide. Réessayer!";
        }else{
            $error_msg = 'Invalid expire year.  Try again!';
        }        
    }else if(check_cc($payment_info['card_number']) == false){
        //4111 1111 1111 1111
        //header("location:../index.php?content=payment&invalid_info=card-number");
        $invalid_info = 'card-number';
        global $lang_cookie;
        if ($lang_cookie == "FR"){
            $error_msg = "Numéro de carte invalide. Réessayer!";
        }else{
            $error_msg = 'Invalid card number.  Try again!';
        }            
    }else if(!preg_match("/^[0-9]{3,4}$/", $payment_info['cvc'])){
        //header("location:../index.php?content=payment&invalid_info=cvc");
        $invalid_info = 'cvc';
        global $lang_cookie;
        if ($lang_cookie == "FR"){
            $error_msg = "CVC invalide. Réessayer!";
        }else{
            $error_msg = 'Invalid cvc.  Try again!';
        }        
    }else{
        if (!isset($_SESSION['username'])){
            echo '<script>window.alert("Login First!");</script>';
            die();
        }else{
            $sales = array();
            $sales['date'] = date('Y-m-d');
            $sales['username'] = $_SESSION['myemail'];
            $sales['pickupDate'] = $pickup_date;
            $sales['pickupTime'] = $pickup_time;
            $sales['subtotal'] = $total_amount;
            $sales['tax'] = '0';
            $sales['total'] = $total_amount;
            $id = insert_sales_into_db($sales);

            if ($id < 0 ){
                echo '<script language="javascript">';
                echo 'alert("Internal Error!")';  //not showing an alert box.
                echo '</script>';
            }else{
                $cookie = isset($_COOKIE['pitstop_cart_items_cookie']) ? $_COOKIE['pitstop_cart_items_cookie'] : "";
                $cookie = stripslashes($cookie);
                $saved_cart_items = json_decode($cookie, true);
                $total = 0;
                $sub_total = 0;

                if(is_array($saved_cart_items) && count($saved_cart_items) > 0) {
                    $product_list = array();
                    foreach($saved_cart_items as $key => $value){
                        logging(__FILE__, __LINE__, "To be inserted data list");
                        logging(__FILE__, __LINE__, $key . " : " . $value['quantity']);
                        $product_list[$key] = $value;
                    }

                    if (insert_product_detailes_list($id, $product_list) > 0){
                        /*
                        foreach($saved_cart_items as $key => $value){ 
                            unset($saved_cart_items[$key]);
                            //unset($_COOKIE["pitstop_cart_items_cookie"]);
                            //setcookie("pitstop_cart_items_cookie", "", time() - 3600);
                            $json = json_encode($saved_cart_items, true);
                            setcookie("pitstop_cart_items_cookie", $json, time() + (86400 * 30), '/'); // 86400 = 1 day
                            $_COOKIE['pitstop_cart_items_cookie']=$json; 
                        }*/
                    }
                }
                
//                header("location:../index.php?content=complete_payment&amount=$total_amount&pickup_date=$pickup_date&pickup_time=$pickup_time");
                echo("<script>location.href = 'index.php?content=complete_payment&amount=$total_amount&pickup_date=$pickup_date&pickup_time=$pickup_time';</script>");
            }
        }
    }
}else {
    $invalid_info = filter_input(INPUT_GET, 'invalid_info', FILTER_SANITIZE_STRING);
    
    $pickup_date = filter_input(INPUT_GET, 'pickup_date', FILTER_SANITIZE_STRING);
    $pickup_time = filter_input(INPUT_GET, 'pickup_time', FILTER_SANITIZE_STRING);
}
?>


<main class="page payment-page">
    <section class="clean-block payment-form dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">
                <h1 style="color:#608e3a;"><?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Paiement";}else{echo "Payment";}?></h1>
                <p><?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Vérifiez votre liste dans le panier et entrez les informations de paiement valides.";}
                else{echo "Check your list in the shopping cart and enter valid payment information.";}?></p>
            </div>
            <form style="border-top:0px solid #608e3a;" method="post" action='index.php?content=payment'>
                <div class="products" style="background-color:rgba(184,156,132,0.16);border-top:2px solid #608e3a;">
                    <h3 class="title"><?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Caisse";}else{echo "Checkout";}?></h3>
                    <?php
                    // read items in the cart
                    $cookie = isset($_COOKIE['pitstop_cart_items_cookie']) ? $_COOKIE['pitstop_cart_items_cookie'] : "";
                    $cookie = stripslashes($cookie);
                    $saved_cart_items = json_decode($cookie, true);
                    $total = 0;
                    $sub_total = 0;

                    // to prevent null value
                    //$saved_cart_items=$saved_cart_items== null ? array() : $saved_cart_items;
                    if(is_array($saved_cart_items) && count($saved_cart_items) > 0) :
                    $ids = array();
                    foreach($saved_cart_items as $id=>$name){
                        array_push($ids, $id);
                    }
                    $products_list_from_db = get_product_detail($ids);
                    $item_count = 0;

                    if (is_array($products_list_from_db)):
                    foreach ($products_list_from_db as $product) :
                      $quantity = $saved_cart_items[$product['pId']]['quantity'];
                    ?>

                    <div class="item row justify-content-center align-items-center">
                        <div class="col-md-5 item-name">
                            <p class="item-name">
                                <?php global $lang_cookie;if ($lang_cookie == "FR"){echo $product['name_fr'];}else{echo $product['name'];} ?>
                            </p>
                        </div>
                        <div class="col-6 col-md-1 price" style="text-align:left;">
                            <span><?php echo $quantity; ?></span>                            
                        </div>
                        <div class="col-6 col-md-1 price" style="text-align:left;">
                            <span>*</span>
                        </div>
                        <div class="col-6 col-md-2 price">
                            <span>$<?php echo $product['price']; ?></span>
                        </div>
                        <div class="col-6 col-md-3 price">
                            <span>$<?php echo ($quantity * $product['price']); ?></span>
                        </div>
                    </div>
                    <?php 
                    $sub_total=$product['price'] * $quantity;
                    $total += $sub_total;
                    $item_count++;
                    endforeach; endif; endif; 
                    ?>
                    <div class="total"><span>Total</span><span class="price">$<?php echo $total; ?></span></div>
                    <div class="total">
                        <span>
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Date et heure de ramassage";}
                            else{echo "Pickup Date & Time";}?></span>
                        <span class="price">
                                <?php global $lang_cookie;$pickup_time_fr="";
                                if ($lang_cookie == "FR"){
                                    if($pickup_time == "Morning") $pickup_time_fr = "Martin";  
                                    else if($pickup_time == "Afternoon") $pickup_time_fr = "Après-midi";
                                    else $pickup_time_fr = "Soir";
                                    echo $pickup_date . " - " . $pickup_time_fr;
                                }else{echo $pickup_date . " - " . $pickup_time;} ?></span></div>
                </div>
                <div class="card-details">
                    <h3 class="title">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Détails de la carte de crédit";}else{echo "Credit Card Details";}?>
                    </h3>
                    <input type="text" id="total_amount" name="total_amount" value="<?php echo $total; ?>" hidden="hidden">
                    <input type="text" id="total_amount" name="pickup_date" value="<?php echo $pickup_date; ?>" hidden="hidden">
                    <input type="text" id="total_amount" name="pickup_time" value="<?php echo $pickup_time; ?>" hidden="hidden">
                    <div class="form-row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="card-holder">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Titulaire de la carte";}else{echo "Card Holder";}?>
                                </label>
                                <input id="card-holder" name="card-holder" class="form-control" type="text" 
                                    <?php if(isset($payment_info['card_holder'])){$value = $payment_info['card_holder'];echo "value=" . "'$value'"; if(isset($invalid_info) && $invalid_info==='card-holder'){echo 'style="border:2px solid red;"';}} ?>
                                       placeholder="<?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Titulaire de la carte";}else{echo "Card Holder";}?>" required="required">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Date d'expiration";}else{echo "Expiration date";}?>
                                </label>
                                <div class="input-group expiration-date">
                                    <input id="expire_month" name="expire_month" class="form-control" type="text" placeholder="MM" required="required"
                                        <?php if(isset($payment_info['expire_month'])){$value = $payment_info['expire_month'];echo "value=" . "'$value'"; if(isset($invalid_info) && $invalid_info==='expire_month'){echo 'style="border:2px solid red;"';}} ?>>
                                    <input id="expire_year" name="expire_year" class="form-control" type="text" placeholder="YY" required="required"
                                        <?php if(isset($payment_info['expire_year'])){$value = $payment_info['expire_year'];echo "value=" . "'$value'"; if(isset($invalid_info) && $invalid_info==='expire_year'){echo 'style="border:2px solid red;"';}} ?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="card-number">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Numéro de carte";}else{echo "Card Number";}?>
                                </label>
                                <input id="card-number" name="card-number" class="form-control" type="text" 
                                       <?php if(isset($payment_info['card_number'])){$value = $payment_info['card_number'];echo "value=" . "'$value'"; if(isset($invalid_info) && $invalid_info==='card-number'){echo 'style="border:2px solid red;"';}} ?>
                                       placeholder="<?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Numéro de carte";}else{echo "Card Number";}?>" id="card-number" required="required">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cvc">CVC</label>
                                <input id="cvc" name="cvc" class="form-control" type="text" placeholder="CVC" id="cvc" required="required"
                                       <?php if(isset($payment_info['cvc'])){$value = $payment_info['cvc'];echo "value=" . "'$value'"; if(isset($invalid_info) && $invalid_info==='cvc'){echo 'style="border:2px solid red;"';}} ?>>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" style="background-color:#608e3a; border-color:#608e3a;">
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Procéder";}else{echo "Proceed";}?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
