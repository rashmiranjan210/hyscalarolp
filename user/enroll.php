<?php
session_start();
require_once "../db.php";

if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $user_email = $_SESSION['user_email'];
    $user_query = "SELECT id FROM users WHERE email = '$user_email'";
    $user_res=$conn->query($user_query );
    $user=$user_res->fetch_assoc();
    $user_id = $user['id'];

    $enroll_query = "INSERT INTO enrollments (user_id, course_id) VALUES ('$user_id', '$course_id')";
    if($conn->query($enroll_query)){
        echo "<script>alert('Enrolled successfully!'); window.location.href='course.php?id=$course_id';</script>";
    } else {
        echo "<script>alert('Error enrolling in course.'); window.history.back();</script>";
    }



}










?>