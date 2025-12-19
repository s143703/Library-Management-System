<?php
include "db.php";

/* -----------------------------
   Book class (one record)
------------------------------*/
class Book {
    public $id, $title, $author, $category, $status;

    function __construct($row) {
        $this->id = $row["book_id"];
        $this->title = $row["title"];
        $this->author = $row["author"];
        $this->category = $row["category"];
        $this->status = $row["status"];
    }
}

/* -----------------------------
   Fetch books from DB
------------------------------*/
$q = $_GET["q"] ?? "";

$sql = "SELECT * FROM books
        WHERE title LIKE '%$q%' OR author LIKE '%$q%'";

$result = $conn->query($sql);

/* -----------------------------
   Array of Book objects
------------------------------*/
$books = [];
while ($row = $result->fetch_assoc()) {
    $books[] = new Book($row);
}

/* -----------------------------
   Display function
------------------------------*/
function renderTable($books) {
    echo "<table class='table table-dark'>";
    echo "<tr><th>Title</th><th>Author</th><th>Category</th><th>Status</th></tr>";

    foreach ($books as $b) {
        echo "<tr>
                <td>{$b->title}</td>
                <td>{$b->author}</td>
                <td>{$b->category}</td>
                <td>{$b->status}</td>
              </tr>";
    }
    echo "</table>";
}
?>
<!doctype html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body data-bs-theme="dark" class="container py-4">

<h2>Catalog Search</h2>

<form method="get">
  <input name="q" class="form-control mb-2" placeholder="Search by title or author">
  <button class="btn btn-warning">Search</button>
</form>

<?php renderTable($books); ?>

</body>
</html>
