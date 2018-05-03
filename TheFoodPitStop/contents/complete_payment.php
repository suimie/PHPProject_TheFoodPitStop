<?php
/**
* contact_us.php
* 
* content for the contact us page
* 
* @version 1.0 2018-04-19
* @package The Food Pit Stop
* @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
* @license 
* @since Release 1.0
*/

?>

<main class="page catalog-page">
    <section class="clean-block clean-catalog dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">
                <h1 style="color:#608e3a;">
                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Merci pour votre commande.";}else{echo "Thanks for your order.";}?>
                    <br></h1>
                <p style="font-weight:bold;font-size:21px;">
                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Votre paiement de ";}else{echo "Your payment of ";}?>
                    <span style="color:#608e3a;font-weight: bold;">$<?php 
                        $amount = filter_input(INPUT_GET, 'amount', FILTER_SANITIZE_STRING);
                        echo $amount;
                        ?> </span>
                    &nbsp;<?php global $lang_cookie;if ($lang_cookie == "FR"){echo "est complété.";}else{echo "is completed.";}?></p>
                <p style="font-weight:bold;font-size:21px;"> 
                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Vous pouvez récupérer vos articles commandés dans la ";}else{echo "You can pick up your ordered items in the ";}?>
                    <span style="color:#608e3a;font-weight: bold;">
                        <?php 
                        $pickup_time = filter_input(INPUT_GET, 'pickup_time', FILTER_SANITIZE_STRING);
                        global $lang_cookie;$pickup_time_fr="";
                        if ($lang_cookie == "FR"){
                            if($pickup_time == "Morning") $pickup_time_fr = "Martin";  
                            else if($pickup_time == "Afternoon") $pickup_time_fr = "Après-midi";
                            else $pickup_time_fr = "Soir";
                            echo $pickup_time_fr;
                        }else{echo $pickup_time; }
                        ?>
                    </span> <?php global $lang_cookie;if ($lang_cookie == "FR"){echo " du ";}else{echo "on ";}?>
                    <span style="color:#608e3a;font-weight: bold;">
                        <?php $pickup_date = filter_input(INPUT_GET, 'pickup_date', FILTER_SANITIZE_STRING);
                        echo $pickup_date; 
                        ?> . 
                    </span>
                </p>
                <img src="assets/img/<?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'merci.gif';}else{echo 'thankyou.gif';}?>" style="margin-top:57px;">
                <button class="btn btn-primary btn-block" type="button" onclick="location.href='index.php?content=catalog_page&category=&brand=&page=1'" style="background-color:#608e3a;border:#608e3a;margin:auto;margin-top:38px;width:197px;">
                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Continuer vos achats";}else{echo "Continue shopping";}?>
                </button></div>
        </div>
    </section>
</main>