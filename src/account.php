<?php require 'header.php';
$id = strip_tags($_SESSION['id']);
if(verifysession($_SESSION['username'], $_SESSION['id'], $pdo)){
?>
<h1 style="padding: 30px 100px;">Vos articles</h1>
<?php
    $iddelete = strip_tags($_POST['delete']);
    if(empty($_POST['delete'])) {
    }
    if( isset($_POST['delete']) && delete($iddelete, $pdo)) {
      echo '<div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Yeaah</strong> Article suprimé</div>';
    }

    $query = 'SELECT id, user_id, title, content, img, dat FROM articles WHERE :id = user_id ORDER BY id desc';
    $statement = $pdo->prepare($query);
    $statement->execute([':id' => $id]);
    while( $data = $statement->fetch(PDO::FETCH_ASSOC)):
      ?>
      <div class="jumbotron">
        <h2 class="display-3"><?php echo $data['title'];?></h2>
        <img height="150px" width="150px" src="img/<?php echo $data['img'];?>"/>
        <hr class="my-4">
        <p class="lead"><?php echo $data['dat'];?></p>
        <p class="lead">
          <a class="btn btn-secondary  btn-lg" href="detail.php?id=<?php echo $data['id'];?>" target="_blank" role="button">Consulter</a>
          <a class="btn btn-secondary  btn-lg" href="update.php?id=<?php echo $data['id'];?>" role="button">Modifier</a>
          <form action="account.php" method="post">
            <input name="delete" value="<?php echo $data['id'];?>" hidden/>
            <button type="submit" class="btn btn-secondary  btn-lg">Supprimer</button>
          </form>

        </p>
      </div>
    <?php endwhile;
}
else{
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Hep hep </strong> Veuillez vous connectez</div>';
}?>
