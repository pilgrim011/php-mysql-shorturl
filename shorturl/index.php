<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/includes/form.html.php';
if (isset($_GET['submit']) && !empty($_GET['usrurl']))
{

include $_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php';

$userurl=$_GET['usrurl'];

include $_SERVER['DOCUMENT_ROOT'] . "/includes/function.php";
$rand = generateRandomString();
try
{
$sql = "INSERT IGNORE INTO shortener (fullurl, shortenedurl) VALUES ('$userurl','$rand')";
$s = $pdo->prepare($sql);
$s->execute();
}
catch (PDOException $e)
{
$error = 'Error creating short link: ' . $e->getMessage();

include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
exit();
}
try
{
$sql = "SELECT shortenedurl FROM shortener WHERE fullurl = '$userurl'";
$result = $pdo->query($sql);


}
catch (PDOException $e)
{
$error = 'Error displaying url: ' . $e->getMessage();
include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php';
exit();
}
while ($row = $result->fetch())
{
$res[] = $row['shortenedurl'];
}

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/shorturl";


foreach ($res as $show):

$fullnk = $actual_link . '/' . $show;

echo '<div class="myclass"><a href=' . $fullnk . '>' . $fullnk . '</a></div>';

endforeach;
exit();
}
?>



