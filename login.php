<?php require 'functions.php';?>

<?php if(session_status() == PHP_SESSION_NONE ){
session_start();
session_destroy();
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
    <title>Connexion</title>

    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <!-- Favicons -->
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
      width: 80%;
      margin-right: auto;
      margin-left: auto;
      background:white;
      min-height:70px;
      padding: 30px 30px;
    }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/app.css" rel="stylesheet">
  </head>
  <body>
   <main> 
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><b><i><b class = "bg-info">Kin</b><b class = "bg-danger">Town</b></b></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
           
            <li class="nav-item">
          <a class="nav-link"  href="index.php"> <button type="button" class="btn btn-sm btn-outline-danger">Accueil</button></a></li>
          <a class="nav-link"  href="register.php"> <button type="button" class="btn btn-sm btn-outline-danger">Créer un compte</button></a></li>
         
        
      </ul>
    
    </div>
  </div>
</nav>
<div class="center">  

<h1>connecter vous</h1>
<form action="" method="POST">
    <div class="form-group">
    <label for="">Email</label>
    
    <input type="text" name="username" class="form-control" />
    </div>

    <div class="form-group">
    <label for="">Mot de passe<a href="forget.php">(j'ai oublié mon mot de passe)</a></label>
    
    <input type="password" name="password" class="form-control" />
    </div>
    <br>
    <input type="checkbox" name="remember" id="remembercheckbox"/> <label for="remembercheckbox">Se souvenir de moi</label>
    <br></br>

    <button type="submit" class="btn btn-primary">Se connecter</button><br></br>
    <p >
      <a href="register.php">Je n'ai pas de compte</a>
    </p>
</form></div>
<?php if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'db.php';
    require_once'functions.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE email = :username');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password )){
        
    session_start();
    if (isset($_POST['remember'])) {
      setcookie('user_id',$user ->id, time() + 360 * 24 * 5, '/','localhost',false,true);
    }
        $_SESSION['auth'] = $user;
        $_SESSION['flash'] ['success']= 'vous etes maintenant connecter ';
        header('Location: index_account.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
        
    }
   
}

?>
<?php require 'footer.php'; ?>
