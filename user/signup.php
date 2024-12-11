<?php
if (isset($_POST['submit'])) {
    require_once "../db.php";
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $emailResult = $conn->query($checkEmailQuery);
    
    if ($emailResult->num_rows > 0) {
       
        $error = "Error: Email is already registered.";
    } else {
       
        $qry = "INSERT INTO users(email, password, name) VALUES('$email', '$password', '$name')";
        $res = $conn->query($qry);
        
        if ($res) {
            echo "One Record Inserted";
            header('location:login.php');
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
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
    <form action="signup.php" method="post" class="container-6">
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" class="form-control" required>
        </div>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <button type="submit" name="submit" class="btn btn-primary w-100">Sign Up</button>
    </form>

    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            const password = document.getElementById('password').value;
            const cpassword = document.getElementById('cpassword').value;

            if (password !== cpassword) {
                e.preventDefault();
                alert("Error: Password and Confirm Password do not match.");
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
