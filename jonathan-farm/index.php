<?php
session_start();
include "db.php";

$error = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if ($password == $user['password']) {

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            header("Location: home.php");
            exit();

        } else {

            $error = "Incorrect password.";

        }

    } else {

        $error = "Username not found.";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Jonathan's Farm Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;

background:
linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url('https://images.unsplash.com/photo-1500937386664-56d1dfef3854?q=80&w=1400&auto=format&fit=crop');

background-size:cover;
background-position:center;
}

.login-box{
width:420px;
background:white;
padding:40px;
border-radius:25px;
box-shadow:0 10px 30px rgba(0,0,0,0.3);
text-align:center;
}

.login-box h1{
font-size:38px;
margin-bottom:10px;
color:#065f46;
}

.login-box p{
color:#666;
margin-bottom:30px;
}

.input-box{
margin-bottom:20px;
}

.input-box input{
width:100%;
padding:16px;
border-radius:12px;
border:1px solid #ccc;
font-size:16px;
outline:none;
}

.login-btn{
width:100%;
padding:16px;
border:none;
background:#10b981;
color:white;
font-size:18px;
border-radius:12px;
cursor:pointer;
transition:0.3s;
}

.login-btn:hover{
background:#047857;
}

.error{
background:#fee2e2;
color:#dc2626;
padding:12px;
border-radius:10px;
margin-bottom:20px;
}

.forgot{
margin-top:20px;
display:block;
text-decoration:none;
color:#10b981;
font-weight:600;
}

</style>

</head>

<body>

<div class="login-box">

<h1>Jonathan's Farm</h1>

<p>Professional Farm Management System</p>

<?php
if($error != ""){
echo "<div class='error'>$error</div>";
}
?>

<form method="POST">

<div class="input-box">
<input
type="text"
name="username"
placeholder="Username"
required>
</div>

<div class="input-box">
<input
type="password"
name="password"
placeholder="Password"
required>
</div>
<button type="submit" name="login" class="login-btn">
Login
</button>

</form>

<a href="#" class="forgot">
Forgot Password?
</a>

</div>

</body>
</html>\3