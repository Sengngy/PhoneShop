
<?php 

    session_start();
    ob_start(); 
    
    if(!isset($_SESSION['login'])){
        header('location: login.php');
    }

    if(isset($_GET['status'])){
        session_destroy();
        header('location: login.php');
    }
?>

<?php 
    include('function/func_db.php'); 
    include('function/func_helper.php');
?>

<?php include('view/header.php'); ?>

<?php include('view/sidebar.php'); ?>   
     
<?php include('view/page_header.php'); ?>
        
<?php 
    db_connect();
    $view = 'dashboard';
    if(isset($_GET['view'])){
        $view = $_GET['view'];
    }
    include("view/$view.php"); 
    
?>
            
<?php include('view/footer.php'); ?>