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
    <title>Inscription</title>

    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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

    
  </head>
  <body>
    
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
          <a class="nav-link"  href="login.php"> <button type="button" class="btn btn-sm btn-outline-danger">Se connecter</button></a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>



<?php 


if(!empty($_POST)){

    $errors = array();
    require_once 'db.php';

    if(empty($_POST['username']) || !preg_match('/^[a-zA-z0-9 _]+$/', $_POST['username'])){


        $errors['username'] = "votre Prebom et Nom ne sont pas valide (alphanumerique)";




    

    } 
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "votre email n'est pas valide";

    }else {

        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if($user){
            $errors['email'] = 'cet email est deja utilisé pour un autre compte';
        }

    }
   if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
       $errors['password'] = "vous devez entrez un mot de passe valide";
   }

   if(empty($errors)){

  

    $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?, confirmed_at = NOW()");

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $_SESSION['auth'] = $username;
    $token = str_random(6);

    $req->execute([$_POST['username'],$password,$_POST['email'], $token]);

    $user_id = $pdo->lastInsertId();

   
header('location: login.php');
exit();

   }
}

?>


<?php if(!empty($errors)): ?>

<div class="alert alert-danger">
    <p>Vous n'avez pas remplie le formulaire correctement</p>

    <ul>

    <?php foreach($errors as $error): ?>

    <li><?= $error; ?></li>

    <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>

<div class="center"> 

<h1>Créer un compte </h1>
<form action="" method="POST">
    <div class="form-group">
    <label for="">Prenom et Nom (ex:gedeon kalala) </label>
    
    <input type="text" name="username" class="form-control" />
    </div>

    <div class="form-group">
    <label for="">Email</label>
    
    <input type="text" name="email" class="form-control" />
    </div>

    <div class="form-group">
    <label for="">Mot de passe</label>
    
    <input type="password" name="password" class="form-control" />
    </div>

    <div class="form-group">
    <label for="">confirmer votre mot de passe</label>
    
    <input type="password" name="password_confirm" class="form-control" />

    </div><br>

    <button type="submit" class="btn btn-primary">Créer un compte</button>
<br></br>
    <p >
      <a href="login.php">J'ai déjà un compte</a>
    </p>
</form>
</div>
<?php require 'footer.php'; ?>