<html>
<head>
    <title>Sign Up - My RMS</title>
</head>
<body>
    <h1>Create an Account</h1>
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
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $conn = mysqli_connect("localhost","root","","mydb");
    $query = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        echo "<script>alert('Username already taken')</script>";
    }else{
        $sql = "INSERT INTO users (username,password) VALUES ('$user','$pass')";
        mysqli_query($conn,$sql);
        echo "<script>alert('Account created successfully')</script>";
    }
}
?>
