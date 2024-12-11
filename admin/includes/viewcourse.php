<div class="row">
    <div class="col-md-12">
    <h1 class="mt-3"style="background-color:#edede9;">View Course</h1>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>No</th>
                <th>Course Name</th>
                <th>Course descprition</th>
                <th>Teacher</th>
                <th>Image</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from course";
                $run_order=$conn->query($get_order);
                $i=1;
                while($row_order= $run_order->fetch_assoc()){
                    $pid=$row_order['id'];
                    $Coursename=$row_order['course_name'];
                    $coursedesc=$row_order['course_desc'];
                    $teacher=$row_order['teacher'];
                    $product_image=$row_order['course_img'];
                   
                ?>
                <tr>
                    <td><?php
                     echo $i; ?></td>
                    <td>
                        <?php
                        echo $Coursename                        ?>
                    </td>
                    <td> <?php   echo $coursedesc;  ?></td>

                    <td><?php  echo $teacher;  ?></td>



                    <td> <img src="<?php echo "image" . "/" .$product_image; ?>" alt="img" class="rounded img-responsive" height="90vh"></td>
                    <td class="btn bg-warning btn-warning"><a href="./index.php?pid=<?php echo $pid; ?>"> update</a></td>
                    <td class="btn btn-danger bg-danger"><a href="includes/delete_product.php?id=<?php echo $pid; ?>"> Delete</a></td>

                </tr>
                <?php $i=$i+1; } 
                ?>
            </tbody>
        </table>
    </div>
</div>