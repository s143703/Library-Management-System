<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $subjects = $_POST["subjects"];
    $status = $_POST["status"];

    $sql = "INSERT INTO books (title, author, category, subjects, status)
            VALUES ('$title', '$author', '$category', '$subjects', '$status')";
    $conn->query($sql);

    echo "<p class='text-success'>Book added successfully</p>";
}
?>

<!doctype html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4" data-bs-theme="dark">

<h3>Add Book</h3>

<form method="post">
  <input name="title" class="form-control mb-2" placeholder="Title" required>
  <input name="author" class="form-control mb-2" placeholder="Author" required>
  <input name="category" class="form-control mb-2" placeholder="Category">
  <input name="subjects" class="form-control mb-2" placeholder="subjects">
  <input name="status" class="form-control mb-2" placeholder="status" required>
  <button class="btn btn-warning">Add</button>
</form>

</body>
</html>
