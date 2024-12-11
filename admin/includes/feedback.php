<div class="row">
    <div class="col-md-12">
        <h1 class="mt-3" style="background-color:#edede9;">View Course Feedback</h1>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Feedback</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qry = "SELECT feedback.feedback, users.name, users.id AS user_id 
                        FROM feedback
                        INNER JOIN users ON feedback.user_id = users.id";
                $res = $conn->query($qry);

                if ($res && $res->num_rows > 0) {
                    $i = 1; // Row counter
                    while ($row = $res->fetch_assoc()) {
                        $name = $row['name'];
                        $feedback = $row['feedback'];
                        $user_id = $row['user_id'];
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo htmlspecialchars($name); ?></td>
                            <td><?php echo htmlspecialchars($feedback); ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center text-danger'>No feedback records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
