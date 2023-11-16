<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (isset($_GET['country'])){
  $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else{
  $stmt = $conn->query("SELECT * FROM countries");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>

