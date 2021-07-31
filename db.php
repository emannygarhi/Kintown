<?php
$pdo = new PDO('mysql:dbname=tuto;host=localhost', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>
<?php  

$conn = mysqli_connect("localhost","root","","tuto");
if ($conn===false)
 {
    die("erreur; non connecter au serveur .".
    mysqli_connect_error());
}


?>