<?php

    function get_site_menu(){
        global $con;
        $sql = 'SELECT * FROM tbl_menu';
        $result = $con->query($sql)->fetchAll();

?> 

        <ul class="main-nav nav navbar-nav">   

            <?php foreach($result as $item) { ?>

                <li class=""><a href="<?= $item['link'] ?>"><?= $item['menu_name'] ?></a></li>

            <?php } ?>


        </ul>

<?php

    }

?>