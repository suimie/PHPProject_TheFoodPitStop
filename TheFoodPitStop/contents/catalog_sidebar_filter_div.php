<?php
/**
 * catalog_products_div.php
 * 
 * content for the catalog page
 * 
 * @version 1.0 2018-04-19
 * @package The Food Pit Stop
 * @copyright (c) 2018, Anita Mirshahi, Suim Park, Valini Rangasamy
 * @license 
 * @since Release 1.0
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/TheFoodPitStop/init.php';
?>
<script>
    function click_checkbox(category_count, brand_count){
        var categories = "";
        for(var i=1; i <= category_count; i++){
            var ckb = document.getElementById("formCheck-"+i);

            if (ckb.checked == true){
                if (categories !== "")
                    categories += "+";
                categories+=document.getElementById("formCheck-"+i).title;
            }
        }

        var brands = "";
        for(var i=category_count+1; i <= brand_count; i++){
            var ckb = document.getElementById("formCheck-"+i);

            if (ckb.checked == true){
                if (brands !== "")
                    brands += "+";
                brands += document.getElementById("formCheck-"+i).title;
            }
        }

//        window.alert("Category:" + categories + ", Brand:" + brands);



        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("filter_list").innerHTML = this.responseText;
            }
        };
        //xhttp.open("GET", "../index.php?content=catalog_page&category=&brand=&page=2", true);
        xhttp.open("GET", "contents/catalog_sidebar_filter_div.php?content=catalog_page&category=" + categories +"&brand=" + brands + "&page=1", true);

        xhttp.send();

    //    sleep(1000);

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("product_list").innerHTML = this.responseText;
            }
        };
        //xhttp.open("GET", "../index.php?content=catalog_page&category=&brand=&page=2", true);
        xhttp.open("GET", "contents/catalog_products_div.php?content=catalog_page&category=" + categories +"&brand=" + brands + "&page=1", true);

        xhttp.send();
    }
</script>

<div class="filter-item">
    <h3> <?php 
            global $lang_cookie;
            if ($lang_cookie == "FR") echo 'Catégories';
            else echo 'Categories';
            ?></h3>
    <?php
    $checkbox_counter = 1;
    $categories = get_categories();     // array with pair of {categoryId, category} from db
    $category_array = get_array_from_url('category');   // categoryId array from split url
    $brands = get_brands2($category_array);  // array with pair of {brandId, brand} from db
    $brand_array = get_array_from_url('brand');   // categoryId array from split url
    if (get_count_2d_array($categories) > 0) :
    foreach ($categories as $category) :
        ?>
        <div class="form-check"><input class="form-check-input" type="checkbox" title="<?php echo $category['categoryId']; ?>" style="cursor:pointer;"
            <?php
            if (in_array($category['categoryId'], $category_array)){
            //if ($selected_category === $category['category']) {
                echo "checked='checked'";
            }
            ?> 
            id="formCheck-<?php echo $checkbox_counter; ?>"  
                onclick="click_checkbox(<?php echo get_count_2d_array($categories); ?>, <?php echo get_count_2d_array($brands); ?>)">
            <label class="form-check-label" id="labelCheck-<?php echo $checkbox_counter; ?>" for="formCheck-<?php echo $checkbox_counter; ?>"
                   style="cursor:pointer;">
                <?php 
                global $lang_cookie;
                if ($lang_cookie == "FR") echo $category['category_fr'];
                else echo $category['category']; ?></label></div>

        <?php
        $checkbox_counter++;
    endforeach;
    endif;
    ?>

</div>
<div class="filter-item" >
    <h3> <?php 
                        global $lang_cookie;
                        if ($lang_cookie == "FR") echo 'Marques';
                        else echo 'Brands';
                        ?></h3>
    <?php
    if (get_count_2d_array($brands) > 0) :
    foreach ($brands as $brand) :
        ?>
        <div class="form-check"><input class="form-check-input" type="checkbox" title="<?php echo $brand['brandId']; ?>" style="cursor:pointer;"
            <?php
            if (in_array($brand['brandId'], $brand_array)){
                echo "checked='checked'";
            }
            ?> 
            id="formCheck-<?php echo $checkbox_counter; ?>" onclick="click_checkbox(<?php echo get_count_2d_array($categories); ?>, <?php echo get_count_2d_array($brands); ?>)">
            <label class="form-check-label" id="labelCheck-<?php echo $checkbox_counter; ?>" for="labelCheck-<?php echo $checkbox_counter; ?>" style="cursor:pointer;"><?php echo $brand['brand'] ?></label></div>

            <?php
            $checkbox_counter++;
            endforeach;
            endif;
            ?>
</div>
