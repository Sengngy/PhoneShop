<?php
    function show_error($arr_err,$arr_key){
        if(isset($arr_err[$arr_key])){
            return $arr_err[$arr_key];
        }else{
            return '';
        }
    }

?>