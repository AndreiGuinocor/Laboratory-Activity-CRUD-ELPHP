<?php
include 'db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Deleted</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="container mt-5 text-center">
      <div class="alert alert-success">
        Student deleted successfully!
      </div>
      <a href="select.php" class="btn btn-primary">Back to Students</a>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Error</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="container mt-5 text-center">
      <div class="alert alert-danger">
        Error deleting record: <?php echo $conn->error; ?>
      </div>
      <a href="select.php" class="btn btn-secondary">Back</a>
    </body>
    </html>
    <?php
}
?>
