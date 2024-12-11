<?php
    session_start();
    require_once "../db.php";
    if(!isset($_SESSION['user_email'])){
        echo "<script> window.open('login.php','_self')</script> ";
    }
    else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
    <?php include "navbar.php"; ?>    
    <div id="page1" style="height:60vh; width:100%; background:black; display:flex; justify-content:center; align-items:center;">
        <h1 style="color:white;">Let's Learn, grow, and succeed.</h1>
    </div>

    <div id="page2" style="background:linear-gradient(rgba(0, 0, 0,2 ), rgba(0, 0, 0, 0.5))">
        <h2 style="display:flex; justify-content:center; align-items:center; color:#ddb892;">Courses</h2>
        <div>
        <div class="container text-center">
        <div class="row row-cols-2 p-5">
            <?php
                 require_once "../db.php";
                 $qry="SELECT * FROM course;";
                 $res=$conn->query($qry);
                 

                 for($i=1;$i<=6;$i++){
                    $row=$res->fetch_assoc();
                    ?>
                    <div class="col mb-4"> 
                    <div class="card" style="width: 28rem;">
                        <img src="../admin/image/<?php echo $row['course_img']; ?>" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['course_name']; ?></h5>
                            <p class="card-text"><?php echo $row['course_desc']; ?></p>
                            <a href="course.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Learn More</a>
                            </div>
                    </div>
                </div>

                  
            <?php        
                 }
            ?>


            <!-- <div class="col">column</div>
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div> -->
        </div>
        </div>
        </div>
    </div>

    <div id="page3" style="height:30vh;background:linear-gradient(rgba(0, 0, 0,0.5 ), rgba(0, 0, 0, 0.1))">
    <h2 style="display:flex; justify-content:center; align-items:center; color:#22223b;">feedbacks</h2>

        <div class="container text-centerpt-3">
                 <div class="row">
                    <?php
                        $qry="SELECT * FROM feedback";
                        $res=$conn->query($qry);
                        $row=$res->fetch_assoc();
                        $user_id=$row['user_id'];

                        $qry1="SELECT * FROM users where users.id=$user_id";
                        $res1=$conn->query($qry1);
                        $row1=$res1->fetch_assoc();
                       
                        for($i=1;$i<=3;$i++){
                            ?>
                            <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                <?php echo $row1['name'];?>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p><?php echo $row['feedback'];?></p>
                                    </blockquote>
                                </div>
                             </div>

                            </div>
                            
                      <?php  }
                    ?>

                 </div>
        </div>

    </div>

    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>



<?php } ?>