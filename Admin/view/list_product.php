
<?php     
    include('function/func_product.php');
    include('function/func_category.php');
    

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        if(delete_product($id)){
           header('location: index.php?view=list_product');
        }
    }

    if(isset($_GET['pid']) && isset($_GET['p_status'])){
        update_status($_GET['pid'], $_GET['p_status']);
        header('location: index.php?view=list_product');
    }

    $list_product = get_all_product();

?>

<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2>List products</h2><br><br>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th>#</th>
                                                    <th>product Name</th>
                                                    <th>Price</th>
                                                    <th>Picture</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                	<?php 
                                                    $count = 0;
                                                    foreach($list_product as $row){ 
                                                        $count++;
                                                    ?>
                                                
                                                <tr>
                                                    <td style="vertical-align:middle"><?= $count; ?></td>
                                                    <td style="vertical-align:middle"><?= $row['pname'] ?></td>
                                                    <td style="vertical-align:middle">$<?= $row['price'] ?></td>
                                                    <td style="vertical-align:middle"><img src="files/<?= $row['picture'] ?>" width="50px"></td>
                                                    <td style="vertical-align:middle">
                                                    
                                                    <?php
                                                        $cat_name = get_category($row['cat_id']);
                                                        echo $cat_name['cat_name'];
                                                    ?>
                                                    
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                    <?php if($row['status'] == 1) {?>
                                                            <a style="font-size:18px" href="index.php?view=list_product&pid=<?=$row['pid']?>&p_status=0"><i class="ti-check"></i></a>
                                                    <?php }else{ ?>
                                                        <a style="font-size:18px" href="index.php?view=list_product&pid=<?=$row['pid']?>&p_status=1"><i class="ti-close"></i></a>
                                                    <?php } ?>
                                                    </td>
                                                    <td style="vertical-align:middle"><a style="font-size:18px" href="#" data-toggle="modal" data-target="#product-model-<?= $count; ?>"><i class="ti-trash"></i></a> | <a style="font-size:18px" href=""><i class="ti-marker-alt"></i></a></td>
                                                </tr>


                                                <div class="modal fade" id="product-model-<?= $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Dialog</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure that do you want to delete: &nbsp;&nbsp;<b style="font-size:18px;"><?= $row['pname'] ?></b>&nbsp;&nbsp; ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id" value="<?= $row['pid'] ?>">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>