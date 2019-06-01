<?php

    function get_all_menu(){
        global $con;
        $sql = 'SELECT * FROM tbl_menu';
        $result = $con->query($sql)->fetchAll();
        return $result;
    }

    function delete_menu($id){
        global $con;
        $sql = "DELETE FROM tbl_menu WHERE menu_id=$id";
        $result = $con->query($sql);
        return (bool)$result;
    }

    function add_menu($menu_name, $link, $icon){
        global $con;
        $sql = "INSERT INTO tbl_menu(menu_name,link,icon) VALUES ('".$menu_name."','".$link."','".$icon."')";
        $result = $con->exec($sql);
        return (bool) $result;
    }

?>