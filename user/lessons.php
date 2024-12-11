<?php
session_start();
require_once "../db.php";


if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php', '_self');</script>";
    exit();
}

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $lesson_query = "SELECT * FROM lessons WHERE course_id = ?";
    $lesson_stmt = $conn->prepare($lesson_query);
    $lesson_stmt->bind_param("i", $course_id);
    $lesson_stmt->execute();
    $lessons = $lesson_stmt->get_result();
} else {
    echo "<script>alert('No course selected.'); window.open('index.php', '_self');</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .lesson-container {
            margin-top: 30px;
        }

        .lesson-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .lesson-card h4 {
            margin-bottom: 10px;
        }

        .lesson-card p {
            color: #555;
        }
    </style>
</head>
<body>
    <?php include "navbar.php";?>
        
       

    <div class="container lesson-container">
    <h1 class="mb-4 text-primary">Lessons</h1>
    <?php if ($lessons->num_rows > 0): ?>
        <?php while ($lesson = $lessons->fetch_assoc()): ?>
            <div class="lesson-card border rounded p-3 mb-4 shadow-sm">
            
                <h4 class="text-secondary"><?php echo htmlspecialchars($lesson['lesson_name']); ?></h4>
                <p><?php echo htmlspecialchars($lesson['lesson_desc']); ?></p>
                <?php if ($lesson['video_url']): ?>
                    <p>
                        <strong>Video:</strong> 
                        <a href="<?php echo '../../hyscalar/admin' . htmlspecialchars($lesson['video_url']); ?>" target="_blank" class="text-info">Watch Video</a>
                    </p>
                <?php endif; ?>
                <?php if ($lesson['pdf_url']): ?>
                    <p>
                        <strong>PDF:</strong> 
                        <a href="<?php echo '../../hyscalar/admin' . htmlspecialchars($lesson['pdf_url']); ?>" target="_blank" class="text-info">Download PDF</a>
                    </p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-danger">No lessons available for this course.</p>
    <?php endif; ?>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
