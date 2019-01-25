<?php require 'header.php';

if( empty($_POST['username']) && empty($_POST['password'])) {
}
if( isset($_POST['username']) && isset($_POST['password'])) {
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $password = password_hash ( $password , PASSWORD_DEFAULT );
    if(sameuser($username, $pdo) === true){
      echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oups</strong> Cet identifiants est déjà utilisé</div>';
    }
    else{
      inscription($username, $password, $pdo);
      echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Félicitations</strong> Vous êtes bien inscrit, veuillez vous connecter <a href="connexion.php">ici</a></div>';

    }
}
?>
<div style="padding: 30px 50px;">
<div class="card border-primary mb-4" style="max-width: 20rem;">
  <div class="card-body">
    <h4 class="card-title">Inscription</h4>
    <form method="post" action="inscription.php">
      <label>Identifiants : </label>
      <input type="text" class="form-control" name="username" required/></br>
      <label>Mot de passe : </label>
      <input type="password" class="form-control" name="password" required/></br>
      <button type="submit" class="btn btn btn-secondary">S'inscrire</button>
    </form>
    </div>
  </div>
</div>
