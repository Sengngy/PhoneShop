<?php

    include('function/func_category.php');

    $category_name = '';
    $category_link = "#";
    $category_icon = 'no-photo.png';
    $category_error = [];

    if(isset($_POST['btn_add'])){

        $category_name = $_POST['category_name'];

        if(!empty($_POST['link'])){
            $category_link = $_POST['link'];
        }

        if(empty($category_name)){
            $category_error['category_name'] = 'is-invalid';
        }else{
            if(!empty($_FILES['icon']['name'])){
                $category_icon = $_FILES['icon']['name'];
                $target = 'files/'.$category_icon;
                move_uploaded_file($_FILES['icon']['tmp_name'], $target);
            }
            add_category($category_name, $category_link, $category_icon);
            header('location: index.php?view=list_category');
        }

    }

?>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h2>Add Category</h2>
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control <?= show_error($category_error,'category_name'); ?>" value="" id="category_name" name="category_name" placeholder="category name">
                    <small class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" value="" id="link" name="link" placeholder="Link">
                    <small class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label><br>
                    <input type="file" value="" id="icon" name="icon">
                    <small class="form-text text-danger"></small>
                </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="btn_add">ADD</button>
            </form>
        </div>
    </div>
</div>