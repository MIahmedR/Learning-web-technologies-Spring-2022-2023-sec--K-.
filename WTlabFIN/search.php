<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    header('location:login.php'); // redirect to login page if user not logged in
}
$conn = mysqli_connect("localhost","root","","mydb");
if(isset($_POST['search'])){
    $query = $_POST['query'];
    $sql = "SELECT * FROM requirements WHERE name LIKE '%$query%' OR description LIKE '%$query%'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<p>".$row['name']." - ".$row['description']."</p>";
        }
    }else{
        echo "<p>No results found</p>";
    }
}
?>
