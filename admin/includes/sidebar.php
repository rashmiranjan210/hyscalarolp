<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script> window.open('login.php','_self')</script> ";
    }
    else{

?>


<div class="container-fluid col-md-3 ms-0 col-lg-3 " style="height:100vh;width:auto;">
  <div class="row ">
    <!-- Sidebar -->
    <div class=" sidebar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 top-nav" style="height:100vh; gap:20px;">
        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>

        <li class="nav-item dropdown text-center">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Courses
          </a>
          <ul class="dropdown-menu" id="products">
            <li><a class="dropdown-item" href="index.php?add_course">Add Course</a></li>
            <li><a class="dropdown-item" href="index.php?view_course">View Course</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown text-center">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lesson
          </a>
          <ul class="dropdown-menu" id="productsCategories">
            <li><a class="dropdown-item" href="index.php?a_lesson">Add Lesson</a></li>
            <li><a class="dropdown-item" href="index.php?v_lesson">View Lesson</a></li>
          </ul>
        </li>


        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?view_users">View Student</a>
        </li>
        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?view_feedback">View Feedback</a>
        </li>
        <!-- <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?view_payment">View Payment</a>
        </li>
        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?view_blog">View Blog</a>
        </li> -->
        
      </ul>
    </div>
  </div>
</div>



















<?php } ?>