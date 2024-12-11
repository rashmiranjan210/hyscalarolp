<?php
if (isset($_GET['pid'])) {
    $course_id = $_GET['pid'];
} else {
    //die("Course ID not found.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lesson</title>
</head>
<body>
<div class="add">
    <div class="container">
        <h1 class="text-danger mt-3">Add your Lessons here</h1>
        <div class="addform">
            <form action="includes/addlesson.php" method="post" enctype="multipart/form-data" class="form text-dark py-2 px-4">
                <div class="container">
                    <div class="row">
                        <!-- FIRST PART -->
                        <div class="col-md-6">
                            <input type="hidden" name="pid" value="<?php echo $course_id ; ?>">                          
                            <label for="">Enter Lesson Name</label><br>
                            <input type="text" name="lesson_name" id="" class="form-control mb-3"><br>
                            <label for="">Enter Lesson Description</label><br>
                            <textarea name="lesson_desc" id="" cols='30' rows='5' class="form-control"></textarea> <br>
                        </div>
                        <!-- FIRST PART -->

                        <!-- SECOND PART START -->
                        <div class="col-md-6">
                            <br>
                            <label for="">Upload Video</label><br>
                            <input type="file" name="video" id="" class="form-control mb-3" accept="video/*"><br>
                            <label for="">Upload PDF</label><br>
                            <input type="file" name="pdf" id="" class="form-control mb-3" accept="application/pdf"><br>
                        </div>
                        <!-- SECOND PART END -->
                        <button type="submit" name="adlesson" class="btn btn-outline-dark btn-lg d-block mx-auto mt-2 w-25">Add Lesson</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['adlesson'])) {
    require_once "./db.php";

    // Get course_id from the URL parameter
    $course_id = $_POST['pid']; // Correctly fetching course_id from GET parameter
    $lesson_name = $_POST['lesson_name'];
    $lesson_desc = $_POST['lesson_desc'];

    // Verify if the course exists
    $query = "SELECT id FROM course WHERE id = '$course_id'";
    $result = $conn->query($query);

    if ($result->num_rows == 0) {
        die("Course not found.");
    }

    // Handle video upload
    $video_path = null;
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video_name = uniqid() . "_" . basename($_FILES['video']['name']);
        $video_path = "../uploads/videos/" . $video_name;
        if (!is_dir("../uploads/videos")) {
            mkdir("../uploads/videos", 0777, true);
        }
        if (!move_uploaded_file($_FILES['video']['tmp_name'], $video_path)) {
            die("Error uploading video.");
        }
    }

    // Handle PDF upload
    $pdf_path = null;
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == 0) {
        $pdf_name = uniqid() . "_" . basename($_FILES['pdf']['name']);
        $pdf_path = "../uploads/pdfs/" . $pdf_name;
        if (!is_dir("../uploads/pdfs")) {
            mkdir("../uploads/pdfs", 0777, true);
        }
        if (!move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_path)) {
            die("Error uploading PDF.");
        }
    }

    // Insert lesson into database
    $qry = "INSERT INTO lessons(course_id, lesson_name, lesson_desc, video_url, pdf_url) 
            VALUES('$course_id', '$lesson_name', '$lesson_desc', '$video_path', '$pdf_path')";

    $res = $conn->query($qry);

    if ($res) {
        echo "Lesson added successfully!";
        echo "<script>window.open('../index.php?add_lesson&pid=<?php echo $course_id;?>','_self')</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<script>
</script>
</body>
</html>
