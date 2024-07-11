<?php
// Connect to your database (replace with your own database credentials)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Retrieve the summarization history from the database
$sql = "SELECT * FROM summarization_history";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Display the summarization history
  echo "<h1>Summarization History</h1>";
  echo "<table>";
  echo "<tr><th>ID</th><th>URL</th><th>Title</th><th>Author</th><th>Publication Date</th><th>Summary</th><th>Sentiment</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row["id"]. "</td>";
    echo "<td>". $row["url"]. "</td>";
    echo "<td>". $row["title"]. "</td>";
    echo "<td>". $row["author"]. "</td>";
    echo "<td>". $row["publication_date"]. "</td>";
    echo "<td>". $row["summary"]. "</td>";
    echo "<td>". $row["sentiment"]. "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No summarization history found.";
}

$conn->close();
?>