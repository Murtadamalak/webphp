<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 0 auto;
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h2>Sign Up</h2>
    <form action="new.php" method="POST">

        <label for ="username">username:</label><br>
        <input type="text" name="username" required><br>

        <label for ="password">Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Sign Up" name="signup_btn">
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
<?php
    if (isset($_POST['signup_btn'])) { // هذا الكود الخاص باضافةالبيانات الى الجدول 
        
        $username = $_POST['username'];
        $password =$_POST['password'];  

        $con = mysqli_connect('localhost','root','','webb');
        $cmd = "INSERT INTO `af`( `username`, `password`, `per`)VALUES ('$username' , '$password' ,1)";
        
        if (mysqli_query($con,$cmd)) {
            header("location: login.php");
        }
    }
    session_start();
    if (isset($_SESSION['per'])!= null) {
        header("Location: music.php");
    }
?>
</html>
