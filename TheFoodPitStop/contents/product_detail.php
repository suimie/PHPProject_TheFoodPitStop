<?php
/**
 * product_list.php
 * 
 * content for the product list page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/TheFoodPitStop/init.php';

$pid = isset($_GET['pid']) ? $_GET['pid'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$product = get_product_detail(array($pid)); 
?>

<main class="page product-page">
    <section class="clean-block clean-product dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">

                <!--h1 style="color:#608e3a;">Product Page</h1-->
                <p></p>

                <!--h1 style="color:#608e3a;"><?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Page du produit';}else{echo 'Product Page';}?></h1>-->
                <p></p>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery" style="height:385px;background-color:rgb(255,255,255);">
                                <img src="<?php echo get_product_image_src($product[0]['CategoryId'], $product[0]['pId'], $product[0]['imageType']); ?>" width="100px" height="350px" style="width:350px;margin-left:10px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3><?php global $lang_cookie;if ($lang_cookie == "FR"){echo $product[0]['name_fr'];}else{echo $product[0]['name'];} ?></h3>
                                <div class="rating"><img src="assets/img/star.svg">
                                    <img src="assets/img/star.svg">
                                    <img src="assets/img/star.svg">
                                    <img src="assets/img/star-half-empty.svg">
                                    <img src="assets/img/star-empty.svg">
                                </div>
                                <div class="price">
                                    <h3>$<?php echo $product[0]['price']; ?></h3>
                                </div>
                                <a href="includes/add_to_cart.php?pid=<?php echo $product[0]['pId']; ?>&quantity=1">
                                <button class="btn btn-primary" type="button" style="background-color:#608e3a;"  href="includes/add_to_cart.php?pid=<?php echo $product[0]['pId']; ?>&quantity=1">
                                    <i class="icon-basket">

                                    </i>
                                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Ajouter au panier';}else{echo 'Add to Cart';} ?>

                                </button>
                                </a>
                                <div class="summary">
                                    <p><?php global $lang_cookie;if ($lang_cookie == "FR"){echo $product[0]['description1_fr'];}else{echo $product[0]['description1'];} ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div>
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#description" id="description-tab"> <?php
                            global $lang_cookie;
                            if ($lang_cookie == "FR")
                                echo 'Description';
                            else
                                echo 'Description';
                            ?></a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#reviews" id="reviews-tab" style="color:#608e3a;"> <?php
                            global $lang_cookie;
                            if ($lang_cookie == "FR")
                                echo 'Revues';
                            else
                                echo 'Reviews';
                            ?></a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane active fade show description" role="tabpanel" id="description">
                                <p><?php global $lang_cookie;if ($lang_cookie == "FR"){echo $product[0]['description2_fr'];}else{echo $product[0]['description2'];} ?></p>
                            </div>
                            <div class="tab-pane fade show" role="tabpanel" id="reviews">
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clean-related-items">
                    <h3 style="color:#608e3a;"> <?php
                            global $lang_cookie;
                            if ($lang_cookie == "FR")
                                echo 'Autres produits';
                            else
                                echo 'Related Products';
                            ?></h3>
                    <div class="items">
                        <div class="row justify-content-center">
                            <?php
                            $related_product = get_products_withlimit(array($product[0]['CategoryId']), $pid, 3);
                            foreach($related_product as $rel_product) : ?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="index.php?content=product_detail&pid=<?php echo $rel_product['pId']; ?>&quantity=1">
                                        <img class="img-fluid d-block mx-auto" src=<?php echo get_product_image_src($rel_product['CategoryId'], $rel_product['pId'], $rel_product['imageType']); ?> width="150px" height="150px" style="color:#608e3a;"></a>
                                    </div>
                                    <div class="related-name"><a href="index.php?content=product_detail&pid=<?php echo $rel_product['pId']; ?>&quantity=1">
                                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo $rel_product['name_fr'];}else{echo $rel_product['name'];} ?></a>
                                        <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4 style="color:#608e3a;">$<?php echo $rel_product['price']; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
