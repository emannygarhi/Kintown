<?php require_once 'functions.php';?>

<?php if(session_status() == PHP_SESSION_NONE ){
session_start();

} 
 ?>
 <?php


 if(!isset($_SESSION['auth'])){
   $_SESSION['flash']['error'] = "vous n'avez pas le droit d'acceder a cette page";
 header('location: index.php');
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
    <title>plusId528
    </title>

    
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
    body{
      width: 100%;
      height: 100vh;
      background: #eee;
    }
    .center{
      width: 90%;
      margin-right: auto;
      margin-left: auto;
      background:white;
      min-height:700px;
      padding: 30px 30px;
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
      
    <a class="nav-link"  href="index_account.php"> <button type="button" class="btn btn-sm btn-outline-danger">Accueil</button></a></li>
    </ul>
     <form class="d-flex">
      <li class="nav-item">
          <a class="nav-link"  href="logout.php"> <button type="button" class="btn btn-sm btn-outline-primary">Se deconnecter</button></a></li>
      </form>
    
     
    </div>
  </div>
</nav>
<div class="center">  

<h2><b>Details</b></h2>
<?php require_once '../cops/db.php'; ?>
<div class="card mb-3" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-10">
<img src="../picture/<?php echo $_GET['photo']; ?>" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title"><i><?php echo $_GET['titre']; ?></i></h5>
<p class="card-text"><i><?php echo $_GET['content']; ?></i></p>
</div>
</div>
</div>
</div>
</div>
</div>
<?php require 'footer.php ' ; ?>