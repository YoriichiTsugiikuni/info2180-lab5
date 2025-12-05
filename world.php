<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$searchTerm = $_GET['country'];
$queryType = isset($_GET['lookup']) ? $_GET['lookup'] : '';

if ($queryType === 'cities') {
    $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$searchTerm%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>
<?php foreach ($results as $record): ?>
  <tr>
    <td><?= $record['name']; ?></td>
    <td><?= $record['district']; ?></td>
    <td><?= $record['population']; ?></td>
  </tr>
<?php endforeach; ?>
</table>
<?php
} else {
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$searchTerm%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>
<?php foreach ($results as $record): ?>
  <tr>
    <td><?= $record['name']; ?></td>
    <td><?= $record['continent']; ?></td>
    <td><?= $record['independence_year']; ?></td>
    <td><?= $record['head_of_state']; ?></td>
  </tr>
<?php endforeach; ?>
</table>
<?php
}