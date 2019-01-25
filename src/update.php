<?php require 'header.php';

if(verifysession($_SESSION['username'], $_SESSION['id'], $pdo)){

    $id = strip_tags($_GET['id']);
    if( empty($_POST['title']) && empty($_POST['content'])) {
    }
    if( isset($_POST['title']) && isset($_POST['content'])) {
        $title = strip_tags($_POST['title']);
        $content = strip_tags($_POST['content']);
        $dat = date('l j \of F Y');
        if(updatearticle($title, $content, $id, $dat, $pdo)){
          echo '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Yeaah</strong> Article modifié</div>';
        }
      }

    $query = 'SELECT id, title, content FROM articles WHERE :id = id';
    $statement = $pdo->prepare($query);
    $statement->execute([':id' => $_GET['id']]);
    while( $data = $statement->fetch(PDO::FETCH_ASSOC)):
      ?>
    <div style="padding: 30px 50px;">
    <div class="card border-primary mb-4" style="max-width: 20rem;">
      <div class="card-body">
        <form method="post" action="update.php?id=<?php echo $id;?>">
          <label>Titre : </label>
          <input type="text" class="form-control" name="title" value="<?php echo $data['title'];?>" required/></br>
          <label>Contenu : </label>
          <textarea class="form-control" name="content" rows="3"  required><?php echo $data['content'];?></textarea></br>
          <button type="submit" class="btn btn btn-secondary">Modifier</button>
        </form>
        </div>
      </div>
    </div>
    <?php endwhile;
  }
  else{
    echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Hep hep </strong> Veuillez vous connectez</div>';
  }?>
