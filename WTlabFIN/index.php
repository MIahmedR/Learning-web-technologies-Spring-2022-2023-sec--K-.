<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    header('location:login.php'); // redirect to login page if user not logged in
}
?>
<html>
<head>
    <title>My RMS</title>
</head>
<body>
    <h1>Welcome to My RMS</h1>
    <form action="search.php" method="post">
        <input type="text" name="query" placeholder="Search requirements...">
        <button type="submit" name="search">Search</button>
    </form>
    <?php
$conn = mysqli_connect("localhost","root","","mydb");
$sql = "SELECT COUNT(*) AS total FROM requirements";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total = $row['total'];
?>
<h2>Total number of requirements: <?php echo $total; ?></h2>

</body>
</html>
