<?php 

    include('function/func_user.php');

    $username = '';
    $pass = '';
    $confirm_pass = '';
    $user_error = [];
    $user_message = [];
    if(isset($_POST['btn_add'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $confirm_pass = $_POST['confirm_pass'];
        
        if(empty($username)){
            $user_error['username'] = "is-invalid";
            $user_message['username'] = 'Please Input Username';
        }

        if(empty($pass)){
            $user_error['pass'] = "is-invalid";
            $user_message['pass'] = 'Please Input Password';
        }

        if(empty($confirm_pass)){
            $user_error['confirm_pass'] = "is-invalid";
            $user_message['confirm_pass'] = 'Please Input Confirm Password';
        }

        if(count($user_error) == 0){
            if(check_user($username)){
                $user_error['username'] = "is-invalid";
                $user_message['username'] = "Your Username Already Exist";
            }else{
                if($pass != $confirm_pass){
                    $user_error['confirm_pass'] = "is-invalid";
                    $user_message['confirm_pass'] = 'Your Confirm Password Incorrect!';
                }else{
                    add_user($username,$pass);
                    header('location: index.php?view=list_user');
                }
            }
        }
    }
?>


<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h2>Add User</h2>
            <br><br>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= show_error($user_error,'username'); ?>" value="<?php echo $username; ?>" id="username" name="username" placeholder="Username">
                    <small class="form-text text-danger"><?= show_error($user_message,'username'); ?></small>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control <?= show_error($user_error,'pass'); ?>" value="<?php echo $pass; ?>" id="pass" name="pass" placeholder="Password">
                    <small class="form-text text-danger"><?= show_error($user_message,'pass'); ?></small>
                </div>
                <div class="form-group">
                    <label for="confirm_pass">Confirm Password</label>
                    <input type="password" class="form-control <?= show_error($user_error,'confirm_pass'); ?>" value="<?php echo $confirm_pass; ?>" id="confirm_pass" name="confirm_pass" placeholder="Confirm Password">
                    <small class="form-text text-danger"><?= show_error($user_message,'confirm_pass'); ?></small>
                </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="btn_add">ADD</button>
            </form>
        </div>
    </div>
</div>