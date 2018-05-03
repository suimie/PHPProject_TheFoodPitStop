<?php
/**
 * home.php
 * 
 * content for the home page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */
?>

<?php
$carousels = array();

$carousels[0]['image'] = 'url(&quot;assets/img/enjoying-life.jpg&quot;)';
$carousels[0]['title'] = 'Enjoy more free time';
$carousels[0]['title_fr'] = "Plus de temps libre <br> pour profiter de la vie!";
$carousels[0]['subtitle'] = ' ';
$carousels[0]['subtitle_fr'] = ' ';


$carousels[1]['image'] = 'url(&quot;assets/img/busystore.jpg&quot;)';
$carousels[1]['title'] = 'Beat the crowd';
$carousels[1]['title_fr'] = "Évitez la foule <br> et faites vos courses en ligne";
$carousels[1]['subtitle'] = ' ';
$carousels[1]['subtitle_fr'] = ' ';

$carousels[2]['image'] = 'url(&quot;assets/img/boxed2.jpg&quot;)';
$carousels[2]['title'] = 'We have your order boxed within the hour!';
$carousels[2]['title_fr'] = "Votre épicerie faite en ligne sera prête <br> dans un délai d'une heure!";
$carousels[2]['subtitle'] = ' ';
$carousels[2]['subtitle_fr'] = ' ';


$carousels[3]['image'] = 'url(&quot;assets/img/Peopler.jpg&quot;)';
$carousels[3]['title'] = 'Avoid the line-ups';
$carousels[3]['title_fr'] = "Plus de files d'attente <br> à l'épicerie";
$carousels[3]['subtitle'] = ' ';
$carousels[3]['subtitle_fr'] = ' ';
?>
<main class="page landing-page">
    <section class="clean-block slider dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">
                <h1 style="color:#608e3a;font-size:50px;"><br><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Toute votre épicerie en un seul clic!';
                        else echo 'One Stop Shopping for all your Groceries';
                        ?><br><br></h1>
                <p style="font-size:30px; max-width:700px;"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Confiez-nous la tâche de faire vos courses!!';
                        else echo 'Let us do the Grocery shopping for you!!';
                        ?></p>
            </div>
            <div class="carousel slide" data-ride="carousel" id="carousel-1">                
                <div class="carousel-inner" role="listbox">
                   
                    <?php foreach ($carousels as $counter => $carousel): ?> 
                        <div class="<?php if ($counter==0){echo "carousel-item active";}else {echo "carousel-item";} ?>">
                        <!--div class="carousel-item active"-->
                           
                            <div class="jumbotron hero-photography carousel-hero" style="background-image:<?php echo $carousel['image']; ?>;">
                                <h1 class="hero-title" style="background-color:rgba(255,255,255,0.75);color:#608e3a;"> <?php
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Plus de temps libre <br> pour profiter de la vie!";
                        else echo 'Enjoy more free time';
                        ?></h1>
                        <p class="hero-subtitle">
                            <?php global $lang_cookie; if ($lang_cookie == "FR"){echo $carousel['subtitle_fr'];}else {echo $carousel['subtitle'];}?>
                        &nbsp;&nbsp;</p>
                        <p><a class="btn btn-primary btn-lg hero-button" role="button" href="#" style="background-color:#608e3a;">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Informez-vous';}else{echo 'Learn more';}?>
                        </a></p>
                                  
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next" style="font-weight:normal;">
                        <i class="fa fa-chevron-right"></i><span class="sr-only">Next</span>
                    </a>
                </div>
                <ol class="carousel-indicators">                    
                    <?php foreach ($carousels as $counter => $carousel): ?> 
                        <li data-target="#carousel-1" data-slide-to="<?php echo $counter; ?>" 
                            class="<?php if ($counter==0){ echo 'active';}?>"></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </section>
    <section class="clean-block features">
        <div class="block-heading">
            <h1 style="color:#608e3a;"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Faites vos courses en ligne n'importe quand";
                        else echo 'Shop Online for your Groceries anytime';
                        ?></h1>
            <p style="font-size:20px; max-width:600px;"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez tout simplement quels produits vous avez besoin parmi notre vaste sélection";
                        else echo 'Just choose which product category you need and browse through thousands of products.';
                        ?></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/bread2.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Boulangerie";
                        else echo 'Bread, buns and rolls';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez parmi nos différents types de pains";
                        else echo 'Choose among our assortment of fresh bread, buns and rolls.';
                        ?></p><a href="index.php?content=catalog_page&category=CTG0001&brand=&=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/veggies.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Fruits et légumes ";
                        else echo 'Vegetables';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Produits de qualité fraîchement récoltés ";
                        else echo 'Quality produce freshly harvested.';
                        ?> </p><a href="index.php?content=catalog_page&category=&brand=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/drinks5.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Boissons";
                        else echo 'Drinks';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "On a plusieurs variété de thé, café, jus et  breuvages";
                        else echo 'We sell a variety of teas, coffee, juices and pops.';
                        ?> </p><a href="index.php?content=catalog_page&category=CTG0002&brand=&=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/dairy1.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Produits laitiers ";
                        else echo 'Dairy products';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Besoin de lait au soja, aux amandes ou le lait de vache? On l'a!";
                        else echo 'Need of eggs, dairy milk, almond milk, soya milk...? We have it!';
                        ?></p><a href="index.php?content=catalog_page&category=&brand=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/pasta2.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Produits céréaliers ";
                        else echo 'Pasta and grains';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "On offre une variété de produits à grains entiers et des pâtes.";
                        else echo 'We offer a wide variety of pasta, grains and rice';
                        ?>.</p><a href="index.php?content=catalog_page&category=&brand=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/frozen2.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Desserts surgelés et pâtisseries";
                        else echo 'Frozen goods and desserts';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Nous avons des desserts comme de la crème glacée et des gâteaux au fromage";
                        else echo 'We carry desserts and ice creams for every taste.';
                        ?></p><a href="index.php?content=catalog_page&category=&brand=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/meat11.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Viande et fruits de mer";
                        else echo 'Meat and Seafood';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "On a toutes sortes de viandes et de fruits de mer.";
                        else echo 'We carry a selection of prime cut meat and fresh seafood.';
                        ?></p><a href="index.php?content=catalog_page&category=CTG0001&brand=&=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/deli7.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Charcuterie";
                        else echo 'Deli';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "On a de la charcuterie comme le salami et le pepperoni. ";
                        else echo 'We carry dried and salted deli meats, such as salami and pepperoni.';
                        ?> </p><a href="index.php?content=catalog_page&category=&brand=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/organic1.jpg">
                        <div class="box-content">
                            <h1 class="title"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Produits Organiques";
                        else echo 'Organic products';
                        ?></h1>
                            <p class="description"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "On dispose d'une gamme complète de produits organiques.";
                        else echo 'We have a complete range of organic products.';
                        ?> </p><a href="index.php?content=catalog_page&category=CTG0002&brand=&=&page=1" class="read-more"><?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo "Choisissez";
                        else echo 'Choose';
                        ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>