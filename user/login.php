<?php
if (isset($_POST['submit'])) {
    require_once "../db.php";
<<<<<<< HEAD
    session_start();
    
=======
>>>>>>> 835b391cf80f338cc13d257528a7a7048d23847c

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM users WHERE email = '$email'";
    $res = $conn->query($qry);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if ($password === $row['password']) { 
<<<<<<< HEAD
            $_SESSION['user_email']=$email;
            $_SESSION['user_id']=$row['id'];
=======
>>>>>>> 835b391cf80f338cc13d257528a7a7048d23847c
            echo "Login successful!";
            header('location:dashboard.php');
        } else {
            echo "<script> alert('Invalid Password');</script>" ;
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
        <p class="text-dark">Don't have an account? <a href="signup.php" style="text-decoration:none" class="fw-bolder text-danger">Sign up</a></p>
<<<<<<< HEAD
        <button type="button" class="btn btn-danger w-100" onclick="window.location.href='google_login.php'">Login with Google</button>
=======
>>>>>>> 835b391cf80f338cc13d257528a7a7048d23847c
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
