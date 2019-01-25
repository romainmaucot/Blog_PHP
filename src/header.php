<?php session_start();
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');
require 'function.php';
if( isset($_POST['usernameco']) && isset($_POST['passwordco'])) {
    $usernameco = strip_tags($_POST['usernameco']);
    $passwordco = strip_tags($_POST['passwordco']);
    if(connexion($usernameco, $passwordco, $pdo) === true){
      header ('Location:account.php');
    }
    else {
      $echecco = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oups</strong> Réessayez ou inscrivez-vous <a href="inscription.php" class="alert-link">Ici</a>
</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Blog++</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Articles <span class="sr-only"></span></a>
      </li>
    <?php
      if(isset($_SESSION['id'])):?>
        <li class="nav-item active">
          <a class="nav-link" href="create.php">Écrire un article <span class="sr-only"></span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" style="padding-right: 20px;" action="account.php">
        <button class="btn btn-secondary my-2 my-sm-1" type="submit">Vos articles <?php echo $_SESSION['username'];?></button>
      </form>
      <form class="form-inline my-2 my-lg-0" action="deconnexion.php">
        <button class="btn btn-secondary my-2 my-sm-1" type="submit">Déconnexion</button>
      </form>
      <?php else: ?>
    </ul>
    <form class="form-inline my-2 my-lg-0" style="padding-right: 20px;" action="inscription.php">
      <button class="btn btn-secondary my-2 my-sm-1" type="submit">Inscription</button>
    </form>
    <form class="form-inline my-2 my-lg-0" action="connexion.php">
      <button class="btn btn-secondary my-2 my-sm-1" type="submit">Connexion</button>
    </form>
    <?php endif;  ?>
  </div>
</nav>
</head>
<body>
