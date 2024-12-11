<?php
session_start();
require_once "../db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $course_id = $_POST['course_id'];
    $feedback = $_POST['feedback'];

    if (!empty($feedback)) {
        // Insert feedback into the database
        $query = "INSERT INTO feedback (user_id, course_id, feedback) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iis", $user_id, $course_id, $feedback);
        
        if ($stmt->execute()) {
            echo "<script>alert('Feedback submitted successfully!');</script>";
            echo "<script>window.location = 'profile.php';</script>";
        } else {
            echo "<script>alert('Error submitting feedback.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter your feedback.');</script>";
    }
}
?>
