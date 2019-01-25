<?php require 'header.php';
echo $echecco;
?>

<div style="padding: 30px 50px;">
<div class="card border-primary mb-4" style="max-width: 20rem;">
  <div class="card-body">
    <h4 class="card-title">Connexion</h4>
    <form method="post" action="connexion.php">
      <label>Identifiants : </label>
      <input type="text" class="form-control" name="usernameco" required/></br>
      <label>Mot de passe : </label>
        <input type="password" class="form-control"   name="passwordco" required/></br>
      <button type="submit" class="btn btn-secondary">Connexion</button>
    </form>
    </div>
  </div>
</div>
