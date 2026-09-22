<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

include 'db.php';

// Patient ID eka ganna
$id = $_GET['id'];

// Update button click nam
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $disease = $_POST['disease'];
    $contact = $_POST['contact'];

    mysqli_query($conn, "UPDATE patients SET 
        name='$name',
        age='$age',
        gender='$gender',
        disease='$disease',
        contact='$contact'
        WHERE id=$id
    ");

    header("Location: dashboard.php");
}

// DB eken thiyena data ganna
$result = mysqli_query($conn, "SELECT * FROM patients WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">



<form method="post">
    <input name="name" value="<?php echo $row['name']; ?>" class="form-control mb-2" required>
    <input name="age" value="<?php echo $row['age']; ?>" class="form-control mb-2" required>
    <input name="gender" value="<?php echo $row['gender']; ?>" class="form-control mb-2">
    <input name="disease" value="<?php echo $row['disease']; ?>" class="form-control mb-2">
    <input name="contact" value="<?php echo $row['contact']; ?>" class="form-control mb-2">
    <button name="update" class="btn btn-primary">Update</button>
    <a href="dashboard.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
