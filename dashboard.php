<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Patient Management</h2>
<a href="logout.php" class="btn btn-danger mb-3">Logout</a>

<form method="post" action="add_patient.php">
    <input name="name" placeholder="Name" class="form-control mb-2" required>
    <input name="age" placeholder="Age" class="form-control mb-2" required>
    <input name="gender" placeholder="Gender" class="form-control mb-2">
    <input name="disease" placeholder="Disease" class="form-control mb-2">
    <input name="contact" placeholder="Contact" class="form-control mb-2">
    <button class="btn btn-success">Add Patient</button>
</form>

<hr>

<table class="table table-bordered">
<tr>
<th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Disease</th><th>Contact</th><th>Actions</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM patients");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['age']}</td>
        <td>{$row['gender']}</td>
        <td>{$row['disease']}</td>
        <td>{$row['contact']}</td>
        <td>
            <a href='edit_patient.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='delete_patient.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
        </td>
    </tr>";
}
?>
</table>

</body>
</html>
