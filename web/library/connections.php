<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

//Style 1
foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
  echo 'Style 1| user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}

//Style 2
$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'Style 2| user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}

//Style 3
$statement = $db->query('SELECT username, password FROM note_user');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);


//PDO prepared style 1
$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


//PDO prepared style 2
$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->execute(array(':name' => $name, ':id' => $id));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
