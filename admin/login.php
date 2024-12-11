<?php
session_start();
if (isset($_POST['submit'])) {
    require_once "../db.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM admin WHERE email = '$email'";
    $res = $conn->query($qry);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if ($password === $row['password']) { 
            $_SESSION['admin_email']=$email;
            // echo "Login successful!";
            // header('location:index.php');
            echo '<script>';
            echo 'alert("login Success")';
            echo '</script>';
            echo "<script>window.open('index.php?dashboard','_self') </script>";
        } else {
            // echo "<script> alert('Invalid Password');</script>" ;
            echo '<script>';
            echo 'alert("Invalid Password")';
            echo '</script>';
        }
    } else {
        echo "No account found with this email.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        form {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }
        label {
            margin-bottom: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post" class="container-6">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
        <!-- <p class="text-dark">Don't have an account? <a href="signup.php" style="text-decoration:none" class="fw-bolder text-danger">Sign up</a></p> -->
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
