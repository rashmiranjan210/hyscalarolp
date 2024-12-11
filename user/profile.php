<?php
session_start();
require_once "../db.php";
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin-top: 50px;
        }
        .tab-content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include "navbar.php";
    $user_id = $_SESSION['user_id'];
        $qry2="SELECT * FROM users where users.id=$user_id";
        $res2=$conn->query($qry2);
        $row2=$res2->fetch_assoc();
    ?>

    <div class="container profile-container">
        <h1 class="text-center text-primary text-dark">HI <?php echo $row2['name']; ?></h1>
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab" aria-controls="courses" aria-selected="true">Enrolled Courses</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="feedback-tab" data-bs-toggle="tab" data-bs-target="#feedback" type="button" role="tab" aria-controls="feedback" aria-selected="false">Feedback</button>
            </li>
        </ul>
        <div class="tab-content" id="profileTabsContent">
            <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                <h3 class="mt-3">Enrolled Courses</h3>
                <ul class="list-group">
                    <?php
                    //session_start();
                    

                    $query = "SELECT * FROM course 
                    INNER JOIN enrollments ON course.id = enrollments.course_id 
                    WHERE enrollments.user_id = $user_id";
                   $result=$conn->query($query );
                    // $stmt->bind_param("i", $user_id);
                    // $stmt->execute();
                    // $result = $stmt->get_result();

                    // $qry="SELECT * FROM enrollments WHERE enrollments.user_id = $user_id ";
                    // $result = mysqli_query($conn, $qry);
                    // while($row = mysqli_fetch_assoc($result)){
                    //     echo '<li class="list-group-item">'.$row['course_id'].'</li>';
                    //     }

                    if ($result->num_rows > 0) {
                        while ($course = $result->fetch_assoc()) {
                            echo "<li class='list-group-item'>
                                    <h5>{$course['course_name']}</h5>
                                    <p>{$course['course_desc']}</p>
                                    <a href='lessons.php?course_id={$course['course_id']}' class='btn btn-primary'>View Lessons</a>
                                  </li>";
                        }
                    } else {
                        echo "<p class='text-danger'>You are not enrolled in any courses yet.</p>";
                    }
                    //$stmt->close();
                    ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="feedback" role="tabpanel" aria-labelledby="feedback-tab">
                <h3 class="mt-3">Feedback</h3>
                <form action="submit_feedback.php" method="POST">
                    <div class="mb-3">
                        <label for="course" class="form-label">Select Course</label>
                          <?php
                        $query = "SELECT * FROM enrollments
                            WHERE enrollments.user_id ='$user_id'";
                    $res=$conn->query($query );
                    while ($course = $res->fetch_assoc()) {                 
                        ?>
                        <input type="number" name="course_id" id="" value="<?php echo $course['course_id']; ?>" >
                        <div><h1><?php echo $course['course_id']; ?></h1></div>
                        <?php } ?>
                            

                    </div>
                    <div class="mb-3">
                        <label for="feedback" class="form-label">Your Feedback</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

