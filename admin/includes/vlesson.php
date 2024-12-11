<div class="row">
    <div class="col-md-12">
    <h1 class="mt-3"style="background-color:#edede9;">View Course</h1>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Course Name</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from course";
                $run_order=$conn->query($get_order);
                $i=1;
                while($row_order= $run_order->fetch_assoc()){
                    $pid=$row_order['id'];
                    $Coursename=$row_order['course_name'];
                ?>
                <tr>
                    <td><?php
                     echo $pid; ?></td>
                    <td>
                        <?php
                        echo $Coursename                        ?>
                    </td>
                    <td class="btn bg-warning btn-warning"><a href="./index.php?view_lesson&pid=<?php echo $pid; ?>"> View Lesson</a></td>
                </tr>
                <?php $i=$i+1; } 
                ?>
            </tbody>
        </table>
    </div>
</div>