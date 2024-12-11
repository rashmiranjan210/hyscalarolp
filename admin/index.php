<?php
    session_start();
    require_once "../db.php";
    if(!isset($_SESSION['admin_email'])){
        echo "<script> window.open('login.php','_self')</script> ";
    }
    else{

?>

<?php
 $admin_session=$_SESSION['admin_email'];
 $qry="select * from admin where email='$admin_session'";
 $res=$conn->query($qry);
 $row=mysqli_fetch_array($res);
$admin_name=$row['name'];

$course="select * from course";
$run_course=$conn->query($course);
$count_course=mysqli_num_rows($run_course);

$get_users="select * from users";
$run_users=$conn->query($get_users);
$count_users=mysqli_num_rows($run_users);

$get_enroll="select * from enrollments";
$run_enroll=$conn->query($get_enroll);
$count_enroll=mysqli_num_rows($run_enroll);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<style>
    a{
        text-decoration:none;
        color:black;
    }
    .hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
    li{
        list-style: none;
    }
    #wrapper{
        padding-left:0;
    }
    #page-wrapper{
        width:100%;
        padding:0;
        background-color:#F9F9F9;

    }
    @media (min-width:768px){
        #wrapper{
            padding-left:0;
        }
        #page-wrapper{
        padding:10px;

    }
    }
    .top-nav{
        padding:0 15px;
    }
    .top-nav>li{
        display:inline-block;
        float:left;
    }
    .top-nav>li>a{
        padding-top:15px;
        padding-bottom:15px;
        line-height:20px;
    }
    .top-nav>li>a:hover{
        color:green;

    }
    .nav-item>a:hover{
        color:green;
        background-color:#eae2b7;
        border-radius:70px;
       
    }
.nav-drop{
    background-color:#415a77;
    padding:10px;
    border-radius:30px;
    color:white;
}

</style>
<body>
    <div class="container-fluid">
        <?php include 'includes/navbar.php' ?>
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-2" style="">
                    <!-- Sidebar content -->
                    <?php include 'includes/sidebar.php'; ?>
                </div>
                
                <!-- Main Content -->
                <div class="col-md-10" style="background-color: #F9F9F9;">
                    <!-- Content -->
                    <?php
                    if(isset($_GET['dashboard'])){
                        include 'dashboard.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['add_course'])){
                        include 'includes/addcourse.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['view_course'])){
                        include 'includes/viewcourse.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['a_lesson'])){
                        include 'includes/alesson.php';
                    }
                    ?>
                     <?php
                    if(isset($_GET['pid'])){
                        $pid=$_GET['pid'];
                    }
                    ?>
                    
                    <?php
                    if(isset($_GET['add_lesson'])){
                        include 'includes/addlesson.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['v_lesson'])){
                        include 'includes/vlesson.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['view_lesson'])){
                        include 'includes/viewlesson.php';
                    }
                    ?>
                      <?php
                    if(isset($_GET['view_users'])){
                        include 'includes/viewusers.php';
                    }
                    ?>
                     <?php
                    if(isset($_GET['view_feedback'])){
                        include 'includes/feedback.php';
                    }
                    ?>
                    

                
                    
                   
                    
            
                </div>
            </div>
        </div>

<script></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


















<?php } ?>