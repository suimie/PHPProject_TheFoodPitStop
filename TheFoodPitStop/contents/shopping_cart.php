<?php
/**
 * shopping_cart.php
 * 
 * content for the shopping cart page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */
?>
<script>
    function change_quantity(pid, quantity) {
        window.location.href = "includes/update_quantity.php?pid=" + pid + "&quantity=" + quantity;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    
    function process_checkout(isLogin){
        if (isLogin == 'false'){
            if (getCookie("pitstop_language") === "FR"){
                window.alert("Ouvrir une session d'abord!");
            }else{
                window.alert("Login First!");
            }
            window.location.href = "index.php?content=login";
            return;
        }
        
        var pickup_date = document.getElementById("pickup_date").innerHTML.replace(/\s/g, "");
        var pickup_time="";

        if (document.getElementById("morning").checked == true){
            pickup_time = "Morning";
        }else if (document.getElementById("afternoon").checked == true){
            pickup_time = "Afternoon";
        }else if (document.getElementById("evening").checked == true){
            pickup_time = "Evening";
        }else {
            window.alert("Must select pickup time!");
            return;
        }
        
        var today = new Date();
        if (today.getHours() > 19){
            var tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));
            var month = (tomorrow.getMonth()+1 < 10) ? "0" + (tomorrow.getMonth()+1) : tomorrow.getMonth()+1;
            var day = (tomorrow.getDate() < 10) ? "0" + tomorrow.getDate() : tomorrow.getDate();
            var date_str = tomorrow.getFullYear() + "-" + month + "-" + day;
        }else {
            var month = (today.getMonth()+1 < 10) ? "0" + (today.getMonth()+1) : today.getMonth()+1;
            var day = (today.getDate() < 10) ? "0" + today.getDate() : today.getDate();
            var date_str = today.getFullYear() + "-" + month + "-" + day;
        }
        if (date_str != pickup_date){
            window.alert("Check the pickup date and time!");
            return;
        }
        
        window.location.href = "index.php?content=payment&pickup_date=" + pickup_date + "&pickup_time=" + pickup_time;
    }      
    

</script>
<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">
                <h1 style="color:#608e3a;"> <?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Panier de commande';
                        else echo 'Shopping Cart';
                        ?></h1>
                <p> <?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Voici tous les articles que vous avez ajoutés à votre panier d'achats pendant votre magasinage en ligne. ";
                        else echo 'Here are all the products that you added to your shopping cart while browsing our web store.';
                        ?></p>
            </div>
            <div class="content">
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
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
                            <div class="product">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-3">
                                        <div class="product-image"><img class="img-fluid d-block mx-auto image" src="<?php echo get_product_image_src($product['CategoryId'], $product['pId'], $product['imageType']); ?>"></div>
                                    </div>
                                    <div class="col-md-5 product-info"><a href="index.php?content=product_detail&pid=<?php echo $product['pId']; ?>&quantity=1" class="product-name" style="color:#608e3a;">
                                            <br><?php global $lang_cookie;if ($lang_cookie == "FR") {echo $product['name_fr'];}else{echo $product['name'];} ?><br><br></a>
                                        <div class="product-specs">
                                            <div><span><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Produit par:';
                        else echo 'Made by:';
                        ?>&nbsp;</span><span class="value"><?php echo $product['brand']; ?></span></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Quantité';
                        else echo 'Quantity';
                        ?></label>
                                        <!--<a href="#" class="product-name" style="color:#608e3a;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>-->
                                        <input type="number" value="<?php echo $quantity; ?>" id="number" class="form-control quantity-input" min="1" max="5" onchange="change_quantity('<?php echo $product['pId']; ?>',this.value);">
                                        
                                    </div>
                                    <div class="col-6 col-md-2 price">
                                        <span style="color:#608e3a;">$<?php echo $product['price']; ?></span>
                                        <br/><br />
                                        <a href="includes/remove_from_cart.php?pid=<?php echo $product['pId']; ?>" class="btn btn-default" style="padding:5px;color:#608e3a;font-size:14px;font-family:sans-serif;font-style: normal;border: 1px solid #608e3a;"><span><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Supprimer';
                        else echo 'Delete';
                        ?></span></a>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            $sub_total=$product['price'] * $quantity;
                            $total += $sub_total;
                            $item_count++;
                            endforeach; endif;
                            else : ?>
                                <div class="product">
                                    <h1> <?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Le panier est vide!';
                        else echo 'Shopping Cart is Empty!';
                        ?></h1>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary" style="background-color:rgba(184,156,132,0.16);">
                            <h3 style="color:#608e3a;"> <?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Vos frais';
                        else echo 'Summary';
                        ?></h3>
                            <h4 style="border-top:1px solid #608e3a;"><span class="text"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Sous-total';
                        else echo 'Subtotal';
                        ?></span><span class="price">$<?php echo $total; ?></span></h4>
                            <h4><span class="text"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Taxes';
                        else echo 'Taxes';
                        ?></span><span class="price">$0</span></h4>
                            <h4></h4>
                            <h4>
                                <span class="text" style="color:#608e3a;"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Total';
                        else echo 'Total';
                        ?></span>
                                <span class="price">$<?php echo $total; ?></span>
                            </h4>
                            <h4></h4>
                                <form>
                                    <h4>
                                        <span class="text" style="color:black;"><?php global $lang_cookie;if ($lang_cookie == "FR") echo 'Ramassage'; else echo 'Pick Up Date';?></span>
                                        <span class="price" id="pickup_date" name="pickup_date" style="font-size:.8em;color:#0066ff;font-style: normal;">
                                            <?php
                                                date_default_timezone_set("America/Toronto");
                                                $h = date('H');
                                                
                                                if ($h > 19){
                                                    $pickup_date = date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d'))));
                                                }else{
                                                    $pickup_date = date('Y-m-d');
                                                }
                                                echo $pickup_date;
                                            ?>
                                        </span>
                                    </h4>
                                    <div class="form-check" style="padding:5px;padding-left:50px;margin-bottom:0px;background-color:#fff;">
                                        <input class="form-check-input" type="radio" name="pickup_time" id="morning"><label class="form-check-label" for="formCheck-1">
                                            <?php global $lang_cookie;if ($lang_cookie == "FR") echo 'Matin'; else echo 'Morning';?> &nbsp;&nbsp;&nbsp;
                                            <?php global $lang_cookie;if ($lang_cookie == "FR") echo '( 08 - 12 )';else echo '( 08 - 12 ) '; ?></label>
                                    </div>
                                    <div class="form-check" style="padding:5px;padding-left:50px;margin-bottom:0px;background-color:#fff;">
                                        <input class="form-check-input" type="radio" name="pickup_time" id="afternoon"><label class="form-check-label" for="formCheck-1">
                                            <?php global $lang_cookie;if ($lang_cookie == "FR") echo 'Après-midi';else echo 'Afternoon ';?>&nbsp;
                                                <?php global $lang_cookie;if ($lang_cookie == "FR") echo '( 12 - 16 )';else echo '( 12 - 16 ) '; ?></label>
                                    </div>
                                    <div class="form-check" style="padding:5px;padding-left:50px;margin-bottom:0px;background-color:#fff;">
                                        <input class="form-check-input" type="radio" name="pickup_time" id="evening" checked="checked"><label class="form-check-label" for="formCheck-1"> 
                                            <?php  global $lang_cookie;if ($lang_cookie == "FR") echo 'Soirée';else echo 'Evening';?> &nbsp;&nbsp;&nbsp;&nbsp; 
                            <?php global $lang_cookie;if ($lang_cookie == "FR") echo '( 16 - 20 )';else echo '( 16 - 20 )';?></label>
                                    </div>                            
                                        <button onclick="process_checkout(
                                        <?php if (isset($_SESSION['username'])){echo "'true'";}else{echo "'false'";}?>)" 
                                        <?php if ($total <= 0){echo 'disabled="disabled"';} ?>
                                        class="btn btn-primary btn-block btn-lg" type="button" style="background-color:#608e3a;box-shadow:0 0 0 .2rem #608e3a;border-color:#608e3a;"> 
                                        <?php global $lang_cookie;if ($lang_cookie == "FR") echo 'Passez à la caisse'; else echo 'Checkout';?></button>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    //var cookie = document.cookie;
    //var n = cookie.indexOf("welcome");
    var today = new Date();
    if (today.getHours() > 12){
        document.getElementById("morning").disabled = true;      
    }
    if (today.getHours() > 14) {
        document.getElementById("afternoon").disabled = true;
    }
    if (today.getHours() > 19) {
        document.getElementById("morning").disabled = false;
        document.getElementById("afternoon").disabled = false;
        document.getElementById("evening").disabled = false;
    }
</script>