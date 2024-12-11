<div class="row">
    <div class="col-md-12">
    <h1 class="mt-3"style="background-color:#edede9;">View Course</h1>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from users";
                $run_order=$conn->query($get_order);
                $i=1;
                while($row_order= $run_order->fetch_assoc()){
                    $pid=$row_order['id'];
                    $name=$row_order['name'];
                    $email=$row_order['email'];
                   
                ?>
                <tr>
                    <td><?php
                     echo $i; ?></td>
                    <td>
                        <?php
                        echo  $pid; ?>
                    </td>
                    <td> <?php   echo $name  ?></td>

                    <td><?php  echo $email  ?></td>

                    <td>
                <form action='includes/delete_user.php' method='post' style='display:inline;'>
                    <input type='hidden' name='user_id' value='<?php echo $pid; ?>'>
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>
            </td>
                </tr>
                <?php $i=$i+1; } 
                ?>
            </tbody>
        </table>
    </div>
</div>