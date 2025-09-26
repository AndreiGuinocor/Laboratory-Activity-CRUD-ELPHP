<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $update = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";

    if ($conn->query($update) === TRUE) {
        header("Location: select.php"); // redirect back to list
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h2>Edit Student</h2>
  <form method="post" action="">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Course</label>
      <input type="text" name="course" class="form-control" value="<?php echo $row['course']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Student</button>
    <a href="select.php" class="btn btn-secondary">Cancel</a>
  </form>

</body>
</html>
