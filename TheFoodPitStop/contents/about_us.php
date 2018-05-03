<?php
/**
 * about_us.php
 * 
 * content for the about us page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */
$items = array();

$items[0] = new Contact(array('first_name' => 'Anita',
    'last_name' => 'Mir',
    'image' => 'avatar1.jpg',
    'about' => '',
    'email' => 'anita@example.com',
    'phone' => '514-222-1235',
    'facebook' => 'https://www.facebook.com',
    'instagram' => 'https://www.instagram.com/?hl=en',
    'twitter' => 'https://twitter.com/?lang=en'));

$items[1] = new Contact(array('first_name' => 'Suim',
    'last_name' => 'Par',
    'image' => 'avatar2.jpg',
    'about' => '',
    'email' => 'suim@example.com',
    'phone' => '514-333-1335',
    'facebook' => 'https://www.facebook.com',
    'instagram' => 'https://www.instagram.com/?hl=en',
    'twitter' => 'https://twitter.com/?lang=en'));

$items[2] = new Contact(array('first_name' => 'Valini',
    'last_name' => 'Ran',
    'image' => 'avatar3.jpg',
    'about' => '',
    'email' => 'valini@example.com',
    'phone' => '514-444-1235',
    'facebook' => 'https://www.facebook.com',
    'instagram' => 'https://www.instagram.com/?hl=en',
    'twitter' => 'https://twitter.com/?lang=en'));
?>

<main class="page">
    <section class="clean-block about-us" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">
                <h1 style="color:#608e3a;"> 
                    <?php
                    global $lang_cookie;
                    if ($lang_cookie == "FR")
                        echo 'À propos de nous';
                    else
                        echo 'About Us';
                    ?>
                </h1>
                <p style='max-width:550px'>
                    <?php
                    global $lang_cookie;
                    if ($lang_cookie == "FR")
                        echo "La philosophie du Food PitStop est de fournir à ses clients un service rapide et d'excellents produits de qualité tout en offrant les meilleurs prix. "
                        . "Nous sommes engagés à fournir une information claire sur la valeur nutritionnelle et les ingrédients de nos produits.";
                    else
                        echo 'Our core company philosophy is to provide our clients with prompt service and excellent quality products at the most competitive prices.
                        We are committed to providing clear information on the nutritional value and ingredients of our products we sell.';
                    ?>
                </p>
                <p style='max-width:600px'> 
                    <?php
                    global $lang_cookie;
                    if ($lang_cookie == "FR")
                        echo "Cependant, comme les informations nutritionnelles et les guides alimentaires 
                            sont régulièrement évalués et améliorés, veuillez lire attentivement les étiquettes des produits avant de les consommer.  ";
                    else
                        echo 'However, because products are regularly improved, 
                            guides and dietary or 
                            allergy information may occasionally change. Please always read the label carefully 
                            before using or consuming any products.';
                    ?>
                </p>
            </div>
            <!-- div contacts -->
            <div class="row justify-content-center">
                <?php foreach ($items as $i => $item) : ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center">
                            <img class="card-img-top w-100 d-block" src="assets/img/avatars/<?php echo $item->getImage(); ?>">
                            <div class="card-body info">
                                <h4 class="card-title">
                                    <?php echo $item->contactName(); ?>
                                </h4>
                                <p class="card-text">
                                    <?php echo $item->getAbout(); ?>
                                    <br />
                                    <?php
                                    global $lang_cookie;
                                    if ($lang_cookie == "FR")
                                        echo 'Courriel:';
                                    else
                                        echo 'Email:';
                                    ?> 
                                    <?php echo $item->getEmail(); ?>
                                    <br />
                                    <?php
                                    global $lang_cookie;
                                    if ($lang_cookie == "FR")
                                        echo 'Téléphone: ';
                                    else
                                        echo 'Phone:';
                                    ?> <?php echo $item->getPhone(); ?>
                                    <br />
                                </p>
                                <div class="icons">
                                    <a href="<?php echo $item->getFacebook(); ?>">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                    <a href="<?php echo $item->getInstagram(); ?>">
                                        <i class="icon-social-instagram"></i>
                                    </a>
                                    <a href="<?php echo $item->getTwitter(); ?>">
                                        <i class="icon-social-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- end of div contacts -->
        </div>
    </section>
</main>
