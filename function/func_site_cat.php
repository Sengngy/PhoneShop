<?php

    function get_site_cat(){
        global $con;
        $sql = 'SELECT * FROM tbl_category';
        $result = $con->query($sql)->fetchAll();

?> 

        <ul class="nav nav-cat justify-content-end">    
            <li style="margin-bottom:10px; border:none; color:blue">Category</li>

            <?php foreach($result as $item) { ?>
                <li class="nav-item">
                    <a class="nav-link active" href="brand.php?cat_id=<?= $item['cat_id']; ?>"><?= $item['cat_name'] ?></a>
                </li>
            <?php } ?>


        </ul>

<?php

    }

?>