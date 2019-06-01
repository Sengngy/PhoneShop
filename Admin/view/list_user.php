
<?php     
    include('function/func_user.php');
    $list_user = get_all_user();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        if(delete_user($id)){
           header('location: index.php?view=list_user');
        }
    }

?>

<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2>List Users</h2><br><br>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Role</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                	<?php 
                                                    $count = 0;
                                                    foreach($list_user as $row){ 
                                                        $count++;
                                                ?>
                                                
                                                <tr>
                                                    <th><?= $count; ?></th>
                                                    <td><?= $row['username'] ?></td>
                                                    <td><?= $row['pass'] ?></td>
                                                    <td><?= $row['role'] ?></td>
                                                    <td><a href="#" data-toggle="modal" data-target="#user-model-<?= $count; ?>"><i class="ti-trash"></i></a> | <a href=""><i class="ti-marker-alt"></i></a></td>
                                                </tr>


                                                <div class="modal fade" id="user-model-<?= $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Dialog</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure that do you want to delete: &nbsp;&nbsp;<b style="font-size:18px;"><?= $row['username'] ?></b>&nbsp;&nbsp; ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id" value="<?= $row['user_id'] ?>">
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