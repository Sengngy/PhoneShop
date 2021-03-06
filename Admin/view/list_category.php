
<?php     
    include('function/func_category.php');
    $list_category = get_all_category();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        if(delete_category($id)){
           header('location: index.php?view=list_category');
        }
    }

?>

<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2>List categorys</h2><br><br>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th>#</th>
                                                    <th>Category Name</th>
                                                    <th>Link</th>
                                                    <th>Icon</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                	<?php 
                                                    $count = 0;
                                                    foreach($list_category as $row){ 
                                                        $count++;
                                                ?>
                                                
                                                <tr>
                                                    <th><?= $count; ?></th>
                                                    <td><?= $row['cat_name'] ?></td>
                                                    <td><?= $row['link'] ?></td>
                                                    <td><img src="files/<?= $row['icon'] ?>"></td>
                                                    <td><a href="#" data-toggle="modal" data-target="#category-model-<?= $count; ?>"><i class="ti-trash"></i></a> | <a href=""><i class="ti-marker-alt"></i></a></td>
                                                </tr>


                                                <div class="modal fade" id="category-model-<?= $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Dialog</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure that do you want to delete: &nbsp;&nbsp;<b style="font-size:18px;"><?= $row['cat_name'] ?></b>&nbsp;&nbsp; ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id" value="<?= $row['cat_id'] ?>">
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