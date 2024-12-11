<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <base href="http://localhost:8888/hyscalar/admin/includes/"> -->
</head>
<body>
<div class="add">
        <div class="container">
           
            <h1 class="text-danger mt-3">Add your Courses here</h1>
            <div class="addform">
                <form action="includes/addcourse.php" method="post" enctype="multipart/form-data" class="form text-dark py-2 px-4">
                    <div class="container">
                        <div class="row">
                            <!-- first part -->
                            <div class="col-md-6">
                                <label for="">Enter Course Name</label><br>
                                <input type="text" name="course_name" id=""><br>
                                <label for="">Enter Course Details</label><br>
                                <textarea name="course_desc" id="" cols='30'></textarea> <br>
                                <label for="">Enter Teacher Name</label><br>
                                <input type="text" name="teacher" id=""><br>
                            </div>
                              <!-- first part -->
                              <!-- SECOND PART START -->
                              <div class="col-md-6">
                                <br>
                                <label for="">Enter  images</label><br>
                                <input type="file" name="img1" id=""><br>
                                <input type="file" name="img2" id=""><br>
                              </div>
                               <!-- SECOND PART START -->
                               <button type="submit" name="adcourse" class="btn btn-outline-dark btn-lg d-block mx-auto mt-2 w-25">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
         
    </div>
    <?php
     if(isset($_POST['adcourse'])){
        require_once"./db.php";
        $course_name=$_POST['course_name'];
        $course_desc=$_POST['course_desc'];
        $teacher=$_POST['teacher'];
        $image1=$_FILES['img1'];
        $image2=$_FILES['img2'];
        $temp_name1=$image1['name'];
        $temp_name2=$image2['name'];
        $path1="../image"."/".$temp_name1;
        $path2="../image"."/".$temp_name2;

        if (!move_uploaded_file($image1['tmp_name'], $path1)) {
            die("Error uploading file.");
        }
        if(!move_uploaded_file($image2['tmp_name'],$path2)){
            die("Error uploading file.");
        }
        $qry = "INSERT INTO course(course_name,course_desc,teacher,course_img,course_img2) VALUES('$course_name', '$course_desc', '$teacher','$temp_name1','$temp_name2')";

        $res = $conn->query($qry);
        if($res){
            echo "One Record Inserted";
            echo "<script>window.open('../index.php?add_course','_self') </script>";
            // header('location:login.php');
            } else {
            echo "Error: ".$conn->error;
            }
            // Close Connection
            $conn->close();
    }
    ?>
    <script>
    </script>
<!-- </body>
</html> -->
</body>
</html>