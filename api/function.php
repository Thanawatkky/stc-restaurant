<?php 
date_default_timezone_set('Asia/Bangkok');
    function connection() {
        $conn = new mysqli("localhost","root","","db_restaurant");
        $conn->set_charset('utf8');
        return $conn;
    }
    function insertDB($table, $data){
        $sql = "INSERT INTO $table";
        $fields = "";
        $values = "";
        foreach ($data as $row => $val) {
            $fields .= "$row, ";
            $values .= "'$val', ";
        }
        $fields = rtrim($fields,", ");
        $values = rtrim($values,", ");
        $sql .= "($fields) VALUES($values)";
        return update($sql);
    }
    function update($sql){
       $conn = connection();
        return $conn->query($sql);
    }
    function error_query() {
        $conn = connection();
        return $conn->error;
    }
    function updateDB($table, $data, $id){
        $sql = "UPDATE $table SET ";
        foreach ($data as $row => $val) {
            $sql .= "$row = '$val',";
        }
        $sql = rtrim($sql,", ");
        foreach ($id as $row_id => $val_id) {
            $sql .= "WHERE $row_id = '$val_id' ";
        }
        return update($sql);
    }
    function deleteDB($table, $data) {
        $sql = "DELETE FROM $table";
        foreach ($data as $row => $val) {
            $sql = "WHERE $row = '$val' ";
        }
        return update($sql);
    
    }
    function table_choice($ch) {
        if($ch == 1) {
            return "เล็ก";
        }else if($ch == 2) {
            return "กลาง";
        }else if($ch == 3) {
            return "ใหญ่";
        }
    }
    function table_booking($bk) {
        if($bk == 0) {
            return "ว่าง";
        }else{
            return "ติดจอง";
        }
    }
    // cart systems
    function addToCart($pro_id, $qty) {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if(isset($_SESSION['cart'][$pro_id])){
            $_SESSION['cart'][$pro_id] += $qty;
        }else{
            $_SESSION['cart'][$pro_id] = $qty;
        }
    }
    function removeCart($pro_id) {
        if(isset($_SESSION['cart'][$pro_id])) {
            unset($_SESSION['cart'][$pro_id]);

        }
    }
    function updateCart($pro_id, $qty) {
        if(isset($_SESSION['cart'][$pro_id])) {
            if($qty < 0) {
                $_SESSION['cart'][$pro_id] = $qty;
            }else{
                removeCart($pro_id);
            }
        }
    }
?>