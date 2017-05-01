<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/main.css">
    <title>Shortened link</title>
  </head>
  <body>
<?php
if (!$_SERVER['QUERY_STRING']){

$requri = $_SERVER['REQUEST_URI'];
$str = substr($requri, strrpos($requri, '/') + 1);
include $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';

try
{
$sql = "SELECT fullurl FROM shortener WHERE shortenedurl = '$str'";
$result = $pdo->query($sql);
}
catch (PDOException $e)
{
$error = 'Error displaying url: ' . $e->getMessage();
include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
exit();
}

if ($result->rowCount() > 0) {
while ($row = $result->fetch())
{
$res[] = $row['fullurl'];
}

foreach ($res as $redirect):
header("Location: $redirect");
endforeach;
exit;
}
else {
  echo '<h2>No such link!</h2>';
exit();
}
}

?>
</body>
</html>
