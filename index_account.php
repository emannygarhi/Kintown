<?php require 'functions.php';?>

<?php if(session_status() == PHP_SESSION_NONE ){
session_start();

} 
 ?>
<?php


if(!isset($_SESSION['auth'])){
  $_SESSION['flash']['error'] = "vous n'avez pas le droit d'acceder a cette page";
header('location: login.php');
exit();
}
?>

<!doctype html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Accueil</title>

    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"><!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style type="text/css">
    .menu{
      margin-left: 30px;
    }
      .menu{
        display: flex;
        flex-wrap: wrap;
        align-content: space-around;
      }
      .card{
        margin-right: 10px;
      }
      .all_article{
      margin-left: 30px;
    }
      .all_article{
        display: flex;
        flex-wrap: wrap;
        align-content: space-around;
      }
      
      
    </style>
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index_account.php"><b><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      
        
      </ul>
      <form class="d-flex">
      <li class="nav-item">
          <a class="nav-link"  href="logout.php"> <button type="button" class="btn btn-sm btn-outline-primary">Se deconnecter</button></a></li>
      </form>
    </div>
  </div>
</nav>
<main class="menu">
<h4>Connexion <b class = "bg-info">¤ <?= $_SESSION['auth']->username;?></b></h1></main>
<main class="menu">
<h5>(<?= $_SESSION['auth']->email;?>)</b> </h5>
</main>
<br><?php require_once 'db.php'; 
$req = $pdo->prepare('SELECT * FROM commentaire ORDER BY id DESC');
$req->execute();
 while($reponse = $req->fetch(PDO::FETCH_OBJ)) { ?>
<section id="hero">
		<div class="text-danger">
    
  <main class="menu">
			<p class="animated fadeInDown "><b><i><h4><?php echo $reponse->comment; ?></h4></b></i></p>
			<?php }?>
  </main>
      </div>
	</section>
  <main class="menu">
  
<div class="card" style="width: 18rem;">
        <img src="../photo/restaurant.jpg" class="card-img-top" alt="">
        <div class="card-body">
        <h5 class="card-title"><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i> </h5>
        <p class="card-text"><b>RESTAURANT</b></b></i> </p>
        
        <div class="d-flex justify-content-between align-items-center">
        <a href="../revu/restau.php"> <button type="button" class="btn btn-sm btn-outline-danger">Voir</button></a>
        </div> 
        </div>
        </div>
  
        <div class="card" style="width: 18rem;">
        <img src="../photo/lounge.jpg" class="card-img-top" alt="">
        <div class="card-body">
        <h5 class="card-title"><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i> </h5>
        <p class="card-text"><b>LOUNGE BAR</b></b></i></p>
        
        <div class="d-flex justify-content-between align-items-center">
        <a href="../revu/lounge.php"> <button type="button" class="btn btn-sm btn-outline-danger">Voir</button></a>
        
        
            </div>
        </div>
            </div>
        <div class="card" style="width: 18rem;">
        <img src="../photo/terrasse.jpg" class="card-img-top" alt="">
        <div class="card-body">
        <h5 class="card-title"><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i> </h5>
        <p class="card-text"><b>TERRASSE & NIGHT-CLUB</b></b></i></p>
        
        <div class="d-flex justify-content-between align-items-center">
        <a href="../revu/terrasse.php"> <button type="button" class="btn btn-sm btn-outline-danger">Voir</button></a>
        </div> 
        </div>
        </div>
  
        <div class="card" style="width: 18rem;">
        <img src="../photo/fleuve.jpg" class="card-img-top" alt="">
        <div class="card-body">
        <h5 class="card-title"><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i> </h5>
        <p class="card-text"><b>ESPACE AU BORD DU FLEUVE</b></b></i></p>
        
        <div class="d-flex justify-content-between align-items-center">
        <a href="../revu/fleuve.php"> <button type="button" class="btn btn-sm btn-outline-danger">Voir</button></a>
        
        
            </div>
        </div>
            </div>
            
        <div class="card" style="width: 18rem;">
        <img src="../photo/hotel.jpg" class="card-img-top" alt="">
        <div class="card-body">
        <h5 class="card-title"><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i> </h5>
        <p class="card-text"><b>HOTEL</b></b></i> </p>
        
        <div class="d-flex justify-content-between align-items-center">
        <a href="../revu/hotel.php"> <button type="button" class="btn btn-sm btn-outline-danger">Voir</button></a>
        </div> 
        </div>
        </div>
  
        <div class="card" style="width: 18rem;">
        <img src="../photo/salle.jpg" class="card-img-top" alt="">
        <div class="card-body">
        <h5 class="card-title"><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i> </h5>
        <p class="card-text"><b>SALLE DE CINEMA</b></b></i></p>
        
        <div class="d-flex justify-content-between align-items-center">
        <a href="../revu/salle.php"> <button type="button" class="btn btn-sm btn-outline-danger">Voir</button></a>
        
            </div>
        </div>
            </div>
        <div class="card" style="width: 18rem;">
        <img src="../photo/autre.jpg" class="card-img-top" alt="">
        <div class="card-body">
        <h5 class="card-title"><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i> </h5>
        <p class="card-text"><b>AUTRES</b></b></i></p>
        
        <div class="d-flex justify-content-between align-items-center">
        <a href="../revu/autre.php"> <button type="button" class="btn btn-sm btn-outline-danger">Voir</button></a>
        
            </div>
        </div>
            </div>
        
        </div>
      </div>
  </div>
    </div>
  </main>
  <br>
<br>
<br>


<main class="menu">
  <h2 class="pb-3 border-bottom text-danger"><b><i>Actualités & Activités</i></b> </h2>
</main>
  <main class="all_article">
<?php require_once 'db.php';  
$req = $pdo->prepare('SELECT * FROM all_article ORDER BY id DESC');
$req->execute();
 while($reponse = $req->fetch(PDO::FETCH_OBJ)) { ?>


  <div class="card" style="width: 17rem;">
  <a href="plus.php?titre=<?php echo $reponse->titre;?>&content=<?php echo $reponse->content ?>&photo=
<?php echo $reponse->photo?>" class="btn btn-danger">
<img src="../picture/<?php echo $reponse->photo ?>" class="card-img-top" alt="..."></a>
<div class="card-body">
<h5 class="card-title "><i><b class = "bg-info"><?php echo $reponse->titre; ?></b></i></h5>

<p class="card-text"><small class="text-muted"><?php echo $reponse->date_article; ?></small></p><br>
<a href="plus.php?titre=<?php echo $reponse->titre;?>&content=<?php echo $reponse->content ?>&photo=
<?php echo $reponse->photo?>" class="btn btn-sm btn-outline-danger">Plus de détail</a>
</div>
</div>
</div>
<?php } ?>
</main>

</div>
<?php require 'footer.php ' ; ?>