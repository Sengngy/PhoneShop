<?php

    function get_site_product_byID($id){
        global $con;
        $sql = "SELECT * FROM tbl_product WHERE cat_id=$id";
        $result = $con->query($sql)->fetchAll();

?> 


<div class="row">

        <?php foreach($result as $item) { ?>
            <div class="col-md-4">
                <div class="product">
                    <div class="product-img">
                        <img src="Admin/files/<?= $item['picture']; ?>" alt="">
                        <div class="product-label">
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#"><?= $item['pname']; ?></a></h3>
                        <h4 class="product-price">$<?= $item['price']; ?></h4>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                                    wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                                    compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                    view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-info-circle"></i> detail it</button>
                    </div>
                </div>
            </div>
        <?php } ?>


        </div>



<?php

    }

?>