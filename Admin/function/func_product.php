<?php

    function get_all_product(){
        global $con;
        $sql = "SELECT * FROM tbl_product";
        $result = $con->query($sql)->fetchAll();
        return $result;
    }

    function delete_product($id){
        global $con;
        $sql = "DELETE FROM tbl_product WHERE pid=$id";
        $result = $con->query($sql);
        return (bool)$result;
    }

    function add_product($pname, $price, $picture, $cat_id, $status, $detail){
        global $con;
        $sql = "INSERT INTO tbl_product(pname,price,picture,cat_id,status,detail) VALUES ('".$pname."','".$price."','".$picture."','".$cat_id."','".$status."','".$detail."')";
        $result = $con->exec($sql);
        return (bool) $result;
    }

    function update_status($pid,$status){
        global $con;
        $sql = "UPDATE tbl_product SET status=$status WHERE pid=$pid";
        $result = $con->query($sql);
        return (bool)$result;
    }

?>