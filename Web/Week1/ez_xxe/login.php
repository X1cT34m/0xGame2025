<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style>
/* 来源：CSDN博主-拄杖盲学轻声码 */
* {
     margin: 0;
     padding: 0;
 }

 html {
     height: 100%;
 }

 body {
     height: 100%;
 }

 .container {
     height: 100%;
     background-image: linear-gradient(to right, #fbc2eb, #a6c1ee);
 }

 .login-wrapper {
     background-color: #fff;
     width: 358px;
     height: 588px;
     border-radius: 15px;
     padding: 0 50px;
     position: relative;
     left: 50%;
     top: 50%;
     transform: translate(-50%, -50%);
 }

 .header {
     font-size: 38px;
     font-weight: bold;
     text-align: center;
     line-height: 200px;
 }

 .input-item {
     display: block;
     width: 100%;
     margin-bottom: 20px;
     border: 0;
     padding: 10px;
     border-bottom: 1px solid rgb(128, 125, 125);
     font-size: 15px;
     outline: none;
 }

 .input-item:placeholder {
     text-transform: uppercase;
 }

 .btn {
    text-align: center;
    padding: 10px;
    width: 100%;
    margin-top: 40px;
    background-image: linear-gradient(to right, #a6c1ee, #fbc2eb);
    color: #fff;
    border: none;         
    border-radius: 8px;    
    cursor: pointer;   
    font-size: 16px;
    transition: opacity .25s;
}

.btn:hover {
    opacity: .85;
}

 .msg {
     text-align: center;
     line-height: 88px;
 }

 a {
     text-decoration-line: none;
     color: #abc1ee;
 }
</style>
</head>
<body>
<div class="container">
    <div class="login-wrapper">
        <div class="header">Login</div>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="username" class="input-item" required>
            <input type="password" name="password" placeholder="password" class="input-item" required>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="msg">Try to Login!</div>
    </div>
</div>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === "admin" && $password === "admin123"){
        echo "<script>alert('Login successful!');location.href='xxxxmleee.php';</script>";;
        exit();
    } else {
        echo "<script>alert('Invaild username or password!');</script>";
    }
}

