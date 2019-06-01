<?php

    include('function/func_menu.php');

    $menu_name = '';
    $menu_link = "#";
    $menu_icon = 'no-photo.png';
    $menu_error = [];

    if(isset($_POST['btn_add'])){

        $menu_name = $_POST['menu_name'];

        if(!empty($_POST['link'])){
            $menu_link = $_POST['link'];
        }

        if(empty($menu_name)){
            $menu_error['menu_name'] = 'is-invalid';
        }else{
            if(!empty($_FILES['icon']['name'])){
                $menu_icon = $_FILES['icon']['name'];
                $target = 'files/'.$menu_icon;
                move_uploaded_file($_FILES['icon']['tmp_name'], $target);
            }
            add_menu($menu_name, $menu_link, $menu_icon);
            header('location: index.php?view=list_menu');
        }

    }

?>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h2>Add Menu</h2>
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="menu_name">Menu Name</label>
                    <input type="text" class="form-control <?= show_error($menu_error,'menu_name'); ?>" value="" id="menu_name" name="menu_name" placeholder="Menu name">
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