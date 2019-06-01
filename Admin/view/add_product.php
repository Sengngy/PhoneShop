<?php

    include('function/func_category.php');
    include('function/func_product.php');

    $p_name = '';
    $p_price = '';
    $cat_id = '';
    $p_picture = '';
    $p_status = '0';
    $p_detail = '';
    $p_error = [];

    if(isset($_POST['btn_add_pro'])){

        $p_name = $_POST['pname'];
        $p_price = $_POST['price'];
        $cat_id = $_POST['category'];
        $p_picture = $_FILES['picture']['name'];
        $p_detail = $_POST['detail'];


        if(isset($_POST['status'])){
            $p_status = $_POST['status'];
        }

        if(empty($p_name)){
            $p_error['pname'] = 'is-invalid';
        }

        if(empty($p_price)){
            $p_error['price'] = 'is-invalid';
        }

        if(empty($p_picture)){
            $p_error['picture'] = 'is-invalid';
        }

        if(count($p_error) == 0){
            $target = 'files/'.$p_picture;
            move_uploaded_file($_FILES['picture']['tmp_name'], $target);
            add_product($p_name, $p_price, $p_picture, $cat_id, $p_status, $p_detail);
            header('location: index.php?view=list_product');
        }


    }

?>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h2>Add Product</h2>
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pname"><b>Product Name</b></label>
                    <input type="text" class="form-control <?= show_error($p_error,'pname'); ?>" value="" id="pname" name="pname" placeholder="Product Name">
                    <small class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label><b>Category</b></label>
                    <select name="category" class="form-control form-control-lg">
                        <?php
                            $cat = get_all_category();
                            foreach($cat as $row){  
                        ?>
                        <option value="<?= $row['cat_id']; ?>"><?= $row['cat_name']; ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price"><b>Price</b></label>
                    <input type="text" class="form-control <?= show_error($p_error,'price'); ?>" value="" id="price" name="price" placeholder="Price">
                    <small class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label for="">
                            <input type="checkbox" value="1" name="status"> New Product
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="picture"><b>Picture</b></label><br>
                    <input type="file" value="" id="picture" name="picture" class="form-control <?= show_error($p_error,'picture'); ?>">
                    <small class="form-text text-danger"></small>
                </div>
                <br>
                <div class="form-group">
                    <label for="detail"><b>Detail</b></label>
                    <textarea name="detail" class="form-control" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="btn_add_pro">ADD</button>
            </form>
        </div>
    </div>
</div>