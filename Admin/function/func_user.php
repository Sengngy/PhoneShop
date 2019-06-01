<?php

    function get_all_user(){
        global $con;
        $sql = 'SELECT * FROM tbl_user';
        $result = $con->query($sql)->fetchAll();
        return $result;
    }

    function delete_user($id){
        global $con;
        $sql = "DELETE FROM tbl_user WHERE user_id=$id";
        $result = $con->query($sql);
        return (bool)$result;
    }

    function check_user($username){
        global $con;
        $sql = "SELECT * FROM tbl_user WHERE username='".$username."'";
        $result = $con->query($sql)->fetchAll();
        return (bool) count($result);
    }

    function add_user($username, $pass){
        global $con;
        $sql = "INSERT INTO tbl_user(username, pass) VALUES('".$username."','".$pass."')";
        $result = $con->exec($sql);
        return (bool) $result;
    }

    function login($username,$pass){
        global $con;
        $sql = "SELECT * FROM tbl_user WHERE username='".$username."' AND pass='".$pass."'";
        $result = $con->query($sql)->fetchAll();
        if(count($result) == 1){
            return $result[0];
        }

        return false;
    }

?>