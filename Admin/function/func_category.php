<?php

    function get_category($id){
        global $con;
        $sql = "SELECT * FROM tbl_category WHERE cat_id=$id";
        $result = $con->query($sql)->fetchAll();
        return $result[0];
    }

    function get_all_category(){
        global $con;
        $sql = 'SELECT * FROM tbl_category';
        $result = $con->query($sql)->fetchAll();
        return $result;
    }

    function delete_category($id){
        global $con;
        $sql = "DELETE FROM tbl_category WHERE cat_id=$id";
        $result = $con->query($sql);
        return (bool)$result;
    }

    function add_category($category_name, $link, $icon){
        global $con;
        $sql = "INSERT INTO tbl_category(cat_name,link,icon) VALUES ('".$category_name."','".$link."','".$icon."')";
        $result = $con->exec($sql);
        return (bool) $result;
    }

?>