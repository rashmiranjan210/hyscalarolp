<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script> window.open('login.php','_self')</script> ";
    }
    else{

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="mt-3"style="background-color:#edede9;">Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
   <div class="col-lg-3 col-md-6">
    <div class="card text-dark " style="background-color:#edede9;">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <i class="bi bi-list-task"></i>
                </div>
                <div class="col-9 text-end">
                <div class="huge"><?php echo $count_course; ?></div>
                <div class="huge">Course</div>
                 
                </div>
            </div>
        </div>
        <a href="index.php?view_course" class="card-footer text-white">
            <span class="float-start text-dark">View Details</span>
            <span class="float-end text-dark"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </a>
    </div>
   </div>

   <div class="col-lg-3 col-md-6">
    <div class="card " style="background-color:#ccd5ae;">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                <i class="bi bi-wechat"></i>
                </div>
                <div class="col-9 text-end">
                    <div class="huge"><?php echo $count_users; ?></div>
                    <div class="huge">Student</div>
                </div>
            </div>
        </div>
        <a href="index.php?view_users" class="card-footer text-white">
            <span class="float-start text-dark">View Details</span>
            <span class="float-end text-dark"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </a>
    </div>
   </div>


   <div class="col-lg-3 col-md-6">
    <div class="card " style="background-color:#ccd5ae;">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                <i class="bi bi-wechat"></i>
                </div>
                <div class="col-9 text-end">
                    <div class="huge"><?php echo $count_enroll; ?></div>
                    <div class="huge">Enrollments</div>
                </div>
            </div>
        </div>
        <a href="index.php?view_users" class="card-footer text-white">
            <span class="float-start text-dark">View Details</span>
            <span class="float-end text-dark"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </a>
    </div>
   </div>












<?php } ?>