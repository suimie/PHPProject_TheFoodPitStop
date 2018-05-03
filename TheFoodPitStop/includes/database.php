<?php


/**
 * Database connection and CRUD queries
 * 
 */

/** 
 * connect_db
 * Connect DB and Return connection
 * 
 */
function connect_db(){
    /*
    define('HOSTNAME', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', 'root');
    define('DBNAME', 'pitstop');
     */
    /*
    $host = 'localhost';
    $user = 'cp4837';
    $pw = '3i7h5yos';
    $dbName = 'cp4837_pitstop';
     * 
     */
    $host = 'localhost';
    $user = 'root';
    $pw = 'root';
    $dbName = 'pitstop';
    $conn = new mysqli($host, $user, $pw, $dbName);
    mysqli_set_charset($conn, "utf8");
    
    if ($conn) {
        logging(__FILE__, __LINE__, "Succeeded  to Connect to  MySQL-" . $conn->connect_error);
        return $conn;
    } else {
        logging(__FILE__, __LINE__, "Failed to Connect to MySQL-" . $conn->connect_error);
        return null;
    }
}

/** 
 * disconnect_db
 * Disconnect DB connection
 */
function disconnect_db($conn){
    $conn->close();    
}

/** 
 * get_categories
 * Get All categories list
 */
function get_categories(){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    
    $sql = "SELECT DISTINCT(categoryId), category, category_fr from products WHERE category_fr <> ''";
    logging(__FILE__, __LINE__, $sql);
    $result = $conn->query($sql);
    
    disconnect_db($conn);
    
    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } 
        
    return null;
}

/** 
 * get_product_image_src
 * Get brands list
 * 
 */
function get_brands(){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    
    $sql = "SELECT DISTINCT(brandId), brand from products";
    logging(__FILE__, __LINE__, $sql);
    $result = $conn->query($sql);
    
    disconnect_db($conn);
    
    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } 
        
    return null;
}
/** 
 * get_product_image_src
 * Get brands list with $category
 * @param $category
 */
function get_brands2($categoryarr){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    
    $sql = "SELECT DISTINCT(brandId), brand from products";
    if (count($categoryarr) > 0){
        $category_where = "";
        foreach($categoryarr as $category){
            if ($category === "")   continue;
            if($category_where != "")
                $category_where .= " OR ";
            
            $category_where .= "categoryId = '" . $category . "'";
        }
        
        if ($category_where !== ""){
            $sql .= " WHERE " . $category_where;
        }
    }
    
    logging(__FILE__, __LINE__, $sql);
    $result = $conn->query($sql);
    
    disconnect_db($conn);
    
    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } 
        
    return null;
}


/** 
 * get_products
 * Get products list with $category and $brand
 * $category contain categoryId
 * $$brand contain brandId
 * @param $category, $brand
 * 
 */
function get_products($categoryarr, $brandarr){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    
    $sql = "SELECT * from products ";
    if (count($categoryarr) > 0 || count($brandarr) >0){
        $category_where = "";
        foreach($categoryarr as $category){
            if ($category == "")   continue;
            logging(__FILE__, __LINE__, $category);
            if($category_where != "")
                $category_where .= " OR ";
            
            $category_where .= "categoryId = '" . $category . "'";
        }
        
        $brand_where = "";
        foreach($brandarr as $brand){
            if ($brand == "")   continue;
            
            logging(__FILE__ . ":" . __LINE__ . $brand);
            if($brand_where != "")
                $brand_where .= " OR ";
            
            $brand_where .= "brandId = '" . $brand . "'";
        }
        
        logging(__FILE__, __LINE__, $category_where);        
        logging(__FILE__, __LINE__, $brand_where);
        //if ($category_where != "" and $brand_where != "")
        if (strpos($category_where, 'category') !== false && strpos($brand_where, 'brand') !== false) {
            logging(__FILE__, __LINE__, $category_where . ", " . $brand_where); 
            $sql .= "WHERE (" . $category_where . ") AND (" . $brand_where . ")";
        //else if ($category_where != ""){
        }else if(strpos($category_where, 'category') !== false){
            logging(__FILE__, __LINE__, $category_where); 
            $sql .= "WHERE " . $category_where;
        }else if(strpos($brand_where, 'brand') !== false){
            logging(__FILE__, __LINE__, $brand_where); 
            $sql .= "WHERE " . $brand_where;
        }
    }
    
    logging(__FILE__, __LINE__, $sql);
    $result = $conn->query($sql);
    
    disconnect_db($conn);
    
    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } 
        
    return null;
}


/** 
 * get_products_withlimit
 * Get number of $count of products list with $category 
 * $category contain categoryId
 * $count how many products
 * @param $category, $count
 * 
 */
function get_products_withlimit($categoryarr, $pid, $count){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    
    $sql = "SELECT * from products ";
    if (count($categoryarr) > 0 || count($brandarr) >0){
        $category_where = "";
        foreach($categoryarr as $category){
            if ($category == "")   continue;
            logging(__FILE__, __LINE__, $category);
            if($category_where != "")
                $category_where .= " OR ";
            
            $category_where .= "categoryId = '" . $category . "'";
        }
        
        if(strpos($category_where, 'category') !== false){
            logging(__FILE__, __LINE__, $category_where); 
            $sql .= "WHERE pid!='" . $pid . "' AND " . $category_where;
        }
    }
    $sql .= " LIMIT " . $count;
    
    logging(__FILE__, __LINE__, $sql);
    $result = $conn->query($sql);
    
    disconnect_db($conn);
    
    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } 
        
    return null;
}


/** 
 * get_products_with_searchkey
 * Get products list with search keys
 * $keyarr contain searching keys
 * @param $keyarr
 * 
 */
function get_products_with_searchkey($keyarr){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    
    $sql = "SELECT * from products ";
    if (count($keyarr) > 0){
        $where_stmt = "";
        foreach($keyarr as $key){
            if ($key == "")   continue;
            
            if($where_stmt != "")
                $where_stmt .= " OR ";
            
            $where_stmt .= "category like '%" . $key . "%' OR ";
            $where_stmt .= "category_fr like '%" . $key . "%' OR ";
            $where_stmt .= "name like '%" . $key . "%' OR ";
            $where_stmt .= "name_fr like '%" . $key . "%' OR ";
            $where_stmt .= "description1 like '%" . $key . "%' OR ";
            $where_stmt .= "description1_fr like '%" . $key . "%' OR ";
            $where_stmt .= "description2 like '%" . $key . "%' OR ";
            $where_stmt .= "description2_fr like '%" . $key . "%'";
            
        }
      
        logging(__FILE__, __LINE__, $where_stmt);
        //if ($category_where != "" and $brand_where != "")
        if (strpos($where_stmt, 'category') !== false) {
            $sql .= "WHERE " . $where_stmt;
        }
    }
    
    logging(__FILE__, __LINE__, $sql);
    $result = $conn->query($sql);
    
    disconnect_db($conn);
    
    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } 
        
    return null;
}


/** 
 * get_products
 * Get products list with $category and $brand
 * $category contain categoryId
 * $$brand contain brandId
 * @param $category, $brand
 * 
 */
function get_product_detail($pids){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    

    if (!is_array($pids) ) return null;

    //if (!is_array($pids) && $pid == "") return null;

    
    $sql = "SELECT * from products ";
    $where = "";
    foreach($pids as $pid){
        if ($pid != "")
            if ($where != "")
                $where .= " OR ";
            $where .= "pId='" . $pid . "'";
    }
    
    if($where != ""){
        $sql .= "WHERE " . $where;
    }
    
    $result = $conn->query($sql);
    
    
    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        disconnect_db($conn);

        return $rows;
    } 
    
    disconnect_db($conn);
    
    return null;
}

function user_ok($username, $password)
{
    $conn = connect_db();
    if($conn === null){
        return 0;
    }
    $sql = "SELECT * FROM users WHERE email='$username'";
    
    $result = $conn->query($sql);
    disconnect_db($conn);

    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return password_verify($password, $row['password']);
        }
    }
    
    return false;
}

function user_exist($username){
    $conn = connect_db();
    if($conn === null){
        return 0;
    }
    $sql = "SELECT * FROM users WHERE email='$username'";
    
    $result = $conn->query($sql);
    disconnect_db($conn);
    $count = 0;
    if ($result != null && $result->num_rows > 0) {
        $count = 1;
    }
    return $count;
}

function insert_sales_into_db($sales){
    $conn = connect_db();
    if($conn === null){
        return -1;
    }   
    
    $sql = "INSERT INTO sales (date, username, pickupDate, pickupTime, subtotal, tax, total) VALUES ('";
    $sql .= $sales['date'] . "', '" . $sales['username'] . "', '" . $sales['pickupDate'] . "', '"  . $sales['pickupTime'] . "', ";
    $sql .= $sales['subtotal'] . ", " . $sales['tax'] . ", " . $sales['total'] . ')';
    logging(__FILE__, __LINE__, $sql);
    if ($conn->query($sql) == TRUE){
        $last_id = $conn->insert_id;
        logging(__FILE__, __LINE__, "New record created successfully. Last inserted ID is:" . $last_id);
        disconnect_db($conn);
        return $last_id;
    }else{
        logging(__FILE__, __LINE__, "Error: " . $sql . $conn->error);
        disconnect_db($conn);
        return -1;
    }
}

function insert_product_detailes_list($id, $product_detail_list){
    $conn = connect_db();
    if($conn === null){
        return -1;
    }   

    $sql = 'INSERT INTO salesdetails (salesId, productId, Qty) VALUES ';
    $line = "";
    foreach($product_detail_list as $key=>$value){
        if ($line != "")
            $line .= ', ';
        $line .= "(" . $id . ", '" . $key . "', " . $value['quantity'] . ') ';        
    }
    if ($line != "")
        $sql .= $line;
    logging(__FILE__, __LINE__, $sql);
    if ($conn->query($sql) == TRUE){
        logging(__FILE__, __LINE__, "New sailes details record created successfully.");
        disconnect_db($conn);
        return 1;
    }else{
        logging(__FILE__, __LINE__, "Error: " . $sql . $conn->error);
        disconnect_db($conn);
        return -1;
    }    
}

function insert_new_product($product){
    $conn = connect_db();
    if($conn === null){
        return -1;
    }   

    $sql = 'INSERT INTO products (pId, name, name_fr, BrandId, brand, '
            . 'CategoryId, category, category_fr, price, qtyOnHand,'
            . 'description1, description2, description1_fr, description2_fr, imageType) VALUES ("';
    
    $sql .= $product['pId'] . '", "' . $product['name'] . '", "' . $product['name_fr'] . '", "';
    $sql .= $product['BrandId'] . '", "' . $product['brand'] . '", "' . $product['CategoryId'] . '", "';
    $sql .= $product['category'] . '", "' . $product['category_fr'] . '", "' . $product['price'] . '", "';
    $sql .= $product['qtyOnHand'] . '", "' . $product['description1'] . '", "';
    $sql .= $product['description2'] . '", "' . $product['description1_fr'] . '", "';
    $sql .= $product['description2_fr'] . '", "' . $product['imageType'] . ")";
    
    logging(__FILE__, __LINE__, $sql);
    if ($conn->query($sql) == TRUE){
        logging(_FILE__, __LINE, "New product record created successfully.");
        disconnect_db($conn);
        return 1;
    }else{
        logging(__FILE__, __LINE__, "Error: " . $sql . $conn->error);
        disconnect_db($conn);
        return -1;
    }        
}

function update_product_info($product){
    $conn = connect_db();
    if($conn === null){
        return -1;
    }   

    $sql = 'UPDATE products SET ';  
    $sql .=  'name = "' . $product['name'] . '", name_fr = "' . $product['name_fr'] . '", ';
    $sql .=  'BrandId = "' . $product['BrandId'] . '", brand = "' . $product['brand'] . '", ';
    $sql .=  'CategoryId = "' . $product['CategoryId'] . '", category = "' . $product['category'] . '", ';
    $sql .=  'category_fr = "' . $product['category_fr'] . '", price = "' . $product['price'] . '", ';
    $sql .=  'qtyOnHand = "' . $product['qtyOnHand'] . '", description1 = "' . $product['description1'] . '", ';
    $sql .=  'description2 = "' . $product['description2'] . '", description1_fr = "' . $product['description1_fr'] . '", ';
    $sql .=  'description2_fr = "' . $product['description2_fr'] . '", imageType = "' . $product['imageType'] . '"';
    $sql .= ' WHERE pId ="' . $product['pId'] . '"';
    
    
    logging(__FILE__, __LINE__, $sql);
    if ($conn->query($sql) == TRUE){
        logging(__FILE__, __LINE__, "One product record[" . $product['pId'] . "] is updated successfully.");
        disconnect_db($conn);
        return 1;
    }else{
        logging(__FILE__, __LINE__, "Error: " . $sql . $conn->error);
        disconnect_db($conn);
        return -1;
    }            
}


function isAdmin($username){
    $conn = connect_db();
    if($conn === null){
        return 0;
    }
    $sql = "SELECT isAdmin FROM users WHERE email='$username'";
    
    $result = $conn->query($sql);
    $isAdminV = '0';

    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $isAdminV = $row['isAdmin'];
        }
    } 
    disconnect_db($conn);
    logging(__FILE__, __LINE__, $sql . "Result : [" . $isAdminV . "]");

    return $isAdminV;
}

function update_user_profile($userInfo){
    $conn = connect_db();
    if($conn === null){
        return 0;
    }
    

    $sql = "UPDATE users SET ";
    $updateInfo = "";
    if ($userInfo['plate'] != ""){
        $updateInfo .= "plateNo='" . $userInfo['plate'] . "'";
    }
    
    if($userInfo['phone'] != ""){
        if ($updateInfo != ""){
            $updateInfo .= ", ";
        }
        $updateInfo .= "phone ='" . $userInfo['phone'] . "'";
    }

    if($userInfo['lastname'] != ""){
        if ($updateInfo != ""){
            $updateInfo .= ", ";
        }
        $updateInfo .= "lastName ='" . $userInfo['lastname'] . "'";
    }

    if($userInfo['firstname'] != ""){
        if ($updateInfo != ""){
            $updateInfo .= ", ";
        }
        $updateInfo .= "firstName ='" . $userInfo['firstname'] . "'";
    }

    if($userInfo['username'] != ""){
        if ($updateInfo != ""){
            $updateInfo .= ", ";
        }
        $updateInfo .= "username ='" . $userInfo['username'] . "'";
    }

    if(isset($userInfo['newpassword']) && $userInfo['newpassword'] != ""){
        if ($updateInfo != ""){
            $updateInfo .= ", ";
        }
        $hashedPassword = password_hash($userInfo['newpassword'], PASSWORD_DEFAULT);
        $updateInfo .= "password ='" . $hashedPassword . "'";
    }
    
    if ($updateInfo == "")  return;
    
    $sql .= $updateInfo . " WHERE email='" . $userInfo['email'] . "'";
    
    logging(__FILE__, __LINE__, $sql);
    if ($conn->query($sql) == TRUE){
        logging(__FILE__, __LINE__, "One user record[" . $userInfo['email'] . "] is updated successfully.");
        disconnect_db($conn);
        return 1;
    }else{
        logging(__FILE__, __LINE__, "Error: " . $sql . $conn->error);
        disconnect_db($conn);
        return -1;
    }              
}

function insert_user($userInfo){
    $conn = connect_db();
    if($conn === null){
        return -1;
    }   
    $hashedPassword = password_hash($userInfo['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (firstName, lastName, username, password, email, phone, plateNo)"
                . "VALUES('" . $userInfo['firstname'] . "', '" . $userInfo['lastname'] . "', '"
            . $userInfo['username'] . "', '" . $hashedPassword . "', '" . $userInfo['email'] . "', '"
            . $userInfo['phone'] . "', '" . $userInfo['plate'] . "');";
    
    logging(__FILE__, __LINE__, $sql);
    if ($conn->query($sql) == TRUE){
        logging(__FILE__, __LINE__, "One user record[" . $userInfo['email'] . "] is inserted successfully.");
        disconnect_db($conn);
        return 1;
    }else{
        logging(__FILE__, __LINE__, "Error: " . $sql . $conn->error);
        disconnect_db($conn);
        return -1;
    }              
}

function get_user_profile($email){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    
    $sql = "SELECT * from users WHERE email='" . $email . "'";
    logging(__FILE__, __LINE__, $sql);
    $result = $conn->query($sql);
    
    disconnect_db($conn);
    
    if ($result != null && $result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } 
        
    return null;    
}

function delete_account($email){
    $conn = connect_db();
    if($conn === null){
        return null;
    }
    
    $sql = "DELETE FROM users WHERE email='" . $email . "'";
    
    logging(__FILE__, __LINE__, $sql);
    if ($conn->query($sql) == TRUE){
        logging(__FILE__, __LINE__, "One user record[" . $email . "] is deleted successfully.");
        disconnect_db($conn);
        return 1;
    }else{
        logging(__FILE__, __LINE__, "Error: " . $sql . $conn->error);
        disconnect_db($conn);
        return -1;
    }               
}