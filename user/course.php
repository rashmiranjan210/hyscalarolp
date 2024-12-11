<?php
session_start();
require_once "../db.php";
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
    exit();
}

$user_email=$_SESSION['user_email'];
$user_query = "SELECT id FROM users WHERE email = '$user_email'";
$user_res=$conn->query($user_query);
$user_row=$user_res->fetch_assoc();
$user_id=$user_row['id'];


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = "SELECT * FROM course WHERE id = $id;";
    $res = $conn->query($qry);
    $row = $res->fetch_assoc();

    $enrollment_query = "SELECT * FROM enrollments WHERE user_id = '$user_id' AND course_id = '$id'";

    $enrollment_res=$conn->query( $enrollment_query);
    $is_enrolled = $enrollment_res->num_rows > 0;


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['course_name']; ?> | Course Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #page1 {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url("../admin/image/<?php echo $row['course_img2']; ?>");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .course-details {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .course-img {
            max-width: 100%;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .btn-enroll {
            background-color: #ff9800;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: 0.3s ease;
        }

        .btn-enroll:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>

    <div id="page1">
        <div class="course-details container">
            <img src="../admin/image/<?php echo $row['course_img']; ?>" alt="Course Image" class="course-img">
            <h2 class="text-dark mb-3"><?php echo $row['course_name']; ?></h2>
            <p class="text-secondary"><?php echo $row['course_desc']; ?></p>
            <?php if ($is_enrolled): ?>
                <a href="lessons.php?course_id=<?php echo $id; ?>" class="btn btn-secondary mt-3">See Lessons</a>
            <?php else: ?>
                <form action="enroll.php" method="post" class="mt-3">
                    <input type="hidden" name="course_id" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-primary">Enroll Now</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
