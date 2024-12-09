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














<?php } ?>