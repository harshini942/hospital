<?php
include 'db.php';

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$disease = $_POST['disease'];
$contact = $_POST['contact'];

mysqli_query($conn, 
"INSERT INTO patients (name, age, gender, disease, contact)
VALUES ('$name','$age','$gender','$disease','$contact')");

header("Location: dashboard.php");
?>
