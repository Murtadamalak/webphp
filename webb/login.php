<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    </style>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text"  name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    <p>Don't have an account? <a href="new.php">Sign up</a></p>
</body>

<?php 
    session_start();
    // هذا الكود يسوي عملية تسجيل الدخول
    $con = mysqli_connect('localhost','root','','webb');
    $cmd = 'SELECT * FROM `af`';  //يجيب القيم من الجدول
    $q = mysqli_query($con, $cmd);//ويخزنها بهذا المتغير 
    if (isset($_POST['login'])) {
        
        $msg = 0;
        //هنا راح يسوي مقارنة البيانات الي اجت من حقل الادخال مع الموجودة بلجدول
        while ($row = mysqli_fetch_array($q)) {  
            if ($row['username'] == $_POST['username'] and $row['password'] == $_POST['password']) {
                $msg = 1;
                $_SESSION['per']=$row['per']; 
                $_SESSION['username']=$row['username']; // تكدر تحفظ البيانات الي تعجبك بلجلسة
            } 
        }
        if ($msg == 1) {
            header("Location: music.php");
        }
        else{
            echo "<script> alert('wrong username or password !') </script>";
        }
    }

    // هذا الكود يتأكد في حال اكو جلسة يرجعني لصفحة الجدول
    if (isset($_SESSION['per'])!= null) {
        if ( ($_SESSION['per'])== 3){
            header("Location: music.php");
        } else {
            header("Location: music.php");

        }
    }
?>
</html>
