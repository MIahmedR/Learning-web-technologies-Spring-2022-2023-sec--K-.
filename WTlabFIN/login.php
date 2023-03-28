<html>
<head>
    <title>Login - My RMS</title>
</head>
<body>
    <h1>Login to My RMS</h1>
    <form action="login.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br><br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <h3>Don't have an account?</h3>
    <form action="signup.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br><br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <button type="submit" name="submit">Sign Up</button>
    </form>
</body>
</html>
<?php
session_start();
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $conn = mysqli_connect("localhost","root","","mydb");
    $query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        $_SESSION['username'] = $user;
        $_SESSION['logged_in'] = true; // set logged in status
        header('location:index.php');
    }else{
        echo "<script>alert('Wrong username or password')</script>";
    }
}
?>
