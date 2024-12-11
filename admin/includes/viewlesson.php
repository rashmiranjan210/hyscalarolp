<?php
//require_once "./db.php";

$course_id = $_GET['pid']; // Get course_id from URL
$query = "SELECT * FROM lessons WHERE course_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Lessons</title>
    <!-- Include Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center text-primary">Course Lessons</h1>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-success"><?php echo htmlspecialchars($row['lesson_name']); ?></h3>
                        <p class="card-text"><?php echo htmlspecialchars($row['lesson_desc']); ?></p>
                        <?php if ($row['video_url']): ?>
                            <video class="w-100 mb-3" src="<?php echo 'admin'.'/'. htmlspecialchars($row['video_url']); ?>" controls autoplay muted></video>
                        <?php endif; ?>
                        <?php if ($row['pdf_url']): ?>
                            <a class="btn btn-primary" href="<?php echo 'admin'.'/'. htmlspecialchars($row['pdf_url']); ?>" target="_blank">Download PDF</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$stmt->close();
?>
