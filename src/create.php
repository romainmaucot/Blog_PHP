<?php require 'header.php';
if(verifysession($_SESSION['username'], $_SESSION['id'], $pdo)){

    if( empty($_POST['title']) && empty($_POST['content']) && empty($_FILES['img']['name'])) {
    }
    if( isset($_POST['title']) && isset($_POST['content']) && isset($_FILES['img']['name']) && isset($_SESSION['id'])) {
        $title = strip_tags($_POST['title']);
        $content = strip_tags($_POST['content']);
        $img = date('h:i:s').$_FILES['img']['name'] = strip_tags($_FILES['img']['name']);
        if(uploadimg($img, $_FILES['img']['tmp_name'])){
          $dat = date('l j \of F Y');
          createarticle($title, $content, $img, $_SESSION['id'], $dat, $pdo);
            echo '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Yeaah</strong> Article crée</div>';
        }
        else{
            if($_FILES['img']['error'] == 2){
              echo '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Oups</strong> Image trop lourde</div>';
          }
          else{
              echo '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Oups</strong> Extension d\'image non valide (Autorisés -> jpg, jpeg, png, gif)</div>';
          }
      }
    }

    ?>

    <div style="padding: 30px 50px;">
      <div class="card border-primary mb-4" style="max-width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Ecrire un nouvel article</h4>
          <form method="post" action="create.php" enctype="multipart/form-data">
            <label>Titre : </label>
            <input type="text" class="form-control" name="title" required/></br>
            <label>Contenu : </label>
            <textarea class="form-control" name="content" rows="3" required></textarea></br>
            <label>Image : </label>
            <input type="hidden" name="MAX_FILE_SIZE" value="999999999" />
            <input type="file" name="img" value="" required/></br></br>
            <button type="submit" class="btn btn btn-secondary">Créer</button>
          </form>
        </div>
      </div>
    </div>
    <?php
}
else{
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Hep hep </strong> Veuillez vous connectez</div>';
} ?>
