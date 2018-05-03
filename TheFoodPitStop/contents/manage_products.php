<?php
/**
 * manage_product.php
 * 
 * content for the contact us page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/TheFoodPitStop/init.php';

$update = "no";
global $lang_cookie;
if (isset($_GET) && isset($_GET['productId'])){
    if(isset($_COOKIE['pitstop_language']))
        $lang_cookie = $_COOKIE['pitstop_language'];    
    
    $update = "yes";
    $pid = isset($_GET['productId']) ? $_GET['productId'] : "";
    $product = get_product_detail(array($pid)); 
}

if (isset($_POST) && isset($_POST['productId'])){
    $update = filter_var($_POST['update'], FILTER_SANITIZE_STRING);
    $new_product = array();
    $new_product['pId'] = filter_var($_POST['productId'], FILTER_SANITIZE_STRING);
    $new_product['name'] = filter_var($_POST['productName'], FILTER_SANITIZE_STRING);
    $new_product['name_fr'] = filter_var($_POST['productName_fr'], FILTER_SANITIZE_STRING);
    $new_product['BrandId'] = filter_var($_POST['brandId'], FILTER_SANITIZE_STRING);
    $new_product['brand'] = filter_var($_POST['brandName'], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
    switch ($category){
        case 'Bakery' : case 'Boulangerie' :
            $new_product['CategoryId'] = 'CTG0001';
            $new_product['category'] = 'Bakery';
            $new_product['category_fr'] = 'Boulangerie';        
            break;
        case 'Drinks' : case 'Boissons' :
            $new_product['CategoryId'] = 'CTG0002';
            $new_product['category'] = 'Drinks';
            $new_product['category_fr'] = 'Boissons';        
            break;
        case 'Fruits' : 
            $new_product['CategoryId'] = 'CTG0003';
            $new_product['category'] = 'Fruits';
            $new_product['category_fr'] = 'Fruits';        
            break;
        case 'Vegetable' : case 'Légumes' :
            $new_product['CategoryId'] = 'CTG0004';
            $new_product['category'] = 'Vegetable';
            $new_product['category_fr'] = 'Légumes';        
            break;
    }
    $new_product['price'] = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $new_product['qtyOnHand'] = 0;
    $new_product['description1'] = filter_var($_POST['description1'], FILTER_SANITIZE_STRING);
    $new_product['description2'] = filter_var($_POST['description2'], FILTER_SANITIZE_STRING);
    $new_product['description1_fr'] = filter_var($_POST['description1_fr'], FILTER_SANITIZE_STRING);
    $new_product['description2_fr'] = filter_var($_POST['description2_fr'], FILTER_SANITIZE_STRING);
    $new_product['imageType'] = filter_var($_POST['imageType'], FILTER_SANITIZE_STRING);
    
    if ($update == 'yes'){
        update_product_info($new_product);
    }else {
        insert_new_product($new_product);
    }
    $update = "no";
}
?>

<script>
    function process_keyup_on_productId(e){
        if (e.keyCode == 13) {
            var key_value = document.getElementById("productId").value;
            window.location.href = 'index.php?content=manage_products&productId=' + key_value;

            return false;
        }
        return true;
    }
    
    function clear_fields(){
        document.forms['product_form']['update'].value = 'no';
        document.forms['product_form']['productId'].value = "";
        document.forms['product_form']['productName'].value = "";
        document.forms['product_form']['productName_fr'].value = "";
        document.forms['product_form']['brandId'].value = "";
        document.forms['product_form']['brandName'].value = "";
        document.forms['product_form']['category'].value = "";
        document.forms['product_form']['price'].value = "";
        document.forms['product_form']['description1'].value = "";
        document.forms['product_form']['description2'].value = "";
        document.forms['product_form']['description1_fr'].value = "";
        document.forms['product_form']['description2_fr'].value = "";
        document.forms['product_form']['imageType'].value = "";
    }
    
    function selectBrand(){
        var brandName = document.getElementById("brandId").value;
        document.getElementById('brandName').value = brandName;
    }
</script>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark" style="background-color:rgba(184,156,132,0.28);">
        <div class="container">
            <div class="block-heading" style="margin-top:-38px;">
                <h1 style="color:#608e3a;">
                    <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Gérer les produits';}else{echo 'Manage Products';}?>
                </h1>
                <p><?php global $lang_cookie;if ($lang_cookie == "FR"){echo "L'administrateur peut ajouter, mettre à jour les informations sur les produits.";}else{echo "Admin can add, update products information.";}?></p>
            </div>
            <form id='product_form' style="border-top:2px solid #608e3a;" action="index.php?content=manage_products" method="POST">
                <input type="text" id="update" name="update" value="<?php echo $update; ?>" hidden="hidden">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="productId">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'ID de produit';}else{echo 'Product ID';}?>
                        </label>
                        <input name="productId" id="productId" class="form-control" type="text" placeholder="A0001" autofocus  onkeypress="return process_keyup_on_productId(event);"
                        <?php 
                        if ($update == 'yes'){
                            echo 'value="' . $pid . '"';
                        }
                        ?>
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Catégorie de marque';}else{echo 'Brand Category';}?>
                        </label>
                        <select id="category" name="category" class="form-control">
                          <option <?php if ($update == 'yes' && $product !== null && $product[0]['CategoryId'] === 'CTG0001'){echo 'selected';} ?>>
                          <?php if ($lang_cookie == "FR") {echo 'Boulangerie';} else {echo 'Bakery';} ?>
                          </option>
                          <option <?php if ($update == 'yes' && $product !== null && $product[0]['CategoryId'] === 'CTG0002'){echo 'selected';} ?>>
                          <?php if ($lang_cookie == "FR") {echo 'Boissons';} else {echo 'Drinks';} ?></option>
                          <option <?php if ($update == 'yes' && $product !== null && $product[0]['CategoryId'] === 'CTG0003'){echo 'selected';} ?>>
                          <?php if ($lang_cookie == "FR") {echo 'Fruits';} else {echo 'Fruits';} ?></option>
                          <option <?php if ($update == 'yes' && $product !== null && $product[0]['CategoryId'] === 'CTG0004'){echo 'selected';} ?>>
                          <?php if ($lang_cookie == "FR") {echo 'Légumes';} else {echo 'Vegetables';} ?></option>
                        </select>                    
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="productName">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Nom du produit';}else{echo 'Product Name';}?>
                        </label>
                        <input name="productName" id="productName" class="form-control" type="text" autofocus 
                               placeholder="<?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Anglais';}else{echo 'English';}?>" 
                        <?php if ($update == 'yes'){echo 'value="' . $product[0]['name'] . '"';} ?>>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="productName_fr">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Nom du produit';}else{echo 'Product Name';}?>
                        </label>
                        <input name="productName_fr" id="productName_fr" class="form-control" type="text" 
                               placeholder="<?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Français';}else{echo 'French';}?>"
                        <?php if ($update == 'yes'){echo 'value="' . $product[0]['name_fr'] . '"';} ?>>
                    </div>                    
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="brandId">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Identifiant de marque';}else{echo 'Brand ID';}?>
                        </label>
                        <?php $brands = get_brands(); ?>
                        <select id="brandId" name="brandId" class="form-control" onchange="selectBrand()">
                            <?php foreach($brands as $counter=>$brand) : ?>
                          <option value="<?php echo $brand['brand']; ?>" 
                              <?php if ($update === 'yes' && $product !== null && $product[0]['BrandId'] === $brand['brandId']){echo 'selected';} ?>>
                          <?php echo $brand['brandId']; ?>
                          </option>
                          <?php endforeach; ?>
                        </select>       
                        
                        
                    </div>                    
                    <div class="form-group col-md-6">
                        <label for="brandName">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Marque';}else{echo 'Brand Name';}?>
                        </label>
                        <input readonly name="brandName" id="brandName" class="form-control" type="text" placeholder=" <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Marque est...';}else{echo 'Brand Name is ...';}?>" 
                        <?php if ($update == 'yes'){echo 'value="' . $product[0]['brand'] . '"';}elseif($update == 'no'){echo 'value="' . $brands['0']['brand'] . '"';} ?>>
                    </div>                    
                 </div>
                <div class='row'>
                    <div class="form-group col-md-6">
                        <label for="price">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Prix';}else{echo 'Price';}?>
                        </label>
                        <input name="price" id="price" class="form-control" type="text" placeholder=" <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Prix est...';}else{echo 'Price is ...';}?>" 
                        <?php if ($update == 'yes'){echo 'value="' . $product[0]['price'] . '"';} ?>>
                    </div>  
                    <div class="form-group col-md-6">
                        <label for="imageType">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo "Type d'image";}else{echo "Image Type";}?>
                        </label>
                        <input name="imageType" id="imageType" class="form-control" type="text" placeholder="png, jpg ..." 
                        <?php 
                        if ($update == 'yes'){
                            echo 'value="' . $product[0]['imageType'] . '"';
                        }
                        ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description1">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Description Anglais 1';}else{echo 'English Description 1';}?>
                        </label>
                        <input name="description1" id="description1" class="form-control" type="text" placeholder="<?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Description Anglais 1 est ...';}else{echo 'English Description 1 is...';}?>" 
                        <?php if ($update == 'yes'){echo 'value="' . $product[0]['description1'] . '"';} ?>>
                    </div>                     
                </div>   
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description2">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Description Anglais 2';}else{echo 'English Destcription 2';}?>
                        </label>
                        <input name="description2" id="description2" class="form-control" type="text" placeholder="<?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Description Anglais 2 est ...';}else{echo 'English Description 2 is...';}?>" 
                        <?php if ($update == 'yes'){echo 'value="' . $product[0]['description2'] . '"';} ?>>
                    </div>                     
                </div>   
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description1_fr">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Description Française  1';}else{echo 'English Description 1';}?>
                        </label>
                        <input name="description1_fr" id="description1_fr" class="form-control" type="text" placeholder=" <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Description Française 1 est ...';}else{echo 'French Description 1 is ...';}?>" 
                        <?php if ($update == 'yes'){echo 'value="' . $product[0]['description1_fr'] . '"';} ?>>
                    </div>                     
                </div>   
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description2_fr">
                        <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Description Française 2';}else{echo 'English Description 2';}?>
                        </label>
                        <input name="description2_fr" id="description2_fr" class="form-control" type="text" placeholder="<?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Description Française 2 est ...';}else{echo 'French Description 2 is ...';}?>" 
                        <?php if ($update == 'yes'){echo 'value="' . $product[0]['description2_fr'] . '"';} ?>>
                    </div>                     
                </div>                
                <div class='row'>
                    <div class="form-group col-md-6">
                        <button name="clear" class="btn btn-primary btn-block" type="button" style="background-color:#608e3a;border:2px solid #608e3a;" onclick='clear_fields();'>
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Effacer';}else{echo 'Clear';}?>
                        </button>
                    </div>
                    <div class="form-group col-md-6">
                        <button name="submit" class="btn btn-primary btn-block" type="submit" style="background-color:#608e3a;border:2px solid #608e3a;">
                            <?php global $lang_cookie;if ($lang_cookie == "FR"){echo 'Envoyer';}else{echo 'Send';}?>
                        </button>
                    </div>
                </div>
                <!--div class="success"><!--?= $success ?></div-->
            </form>
        </div>
    </section>
</main>
