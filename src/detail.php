<?php require 'header.php';
$id = strip_tags($_GET['id']);
if( empty($_POST['username']) && empty($_POST['content'])) {
}
if( isset($_POST['username']) && isset($_POST['content'])) {
    $username = strip_tags($_POST['username']);
    $content = strip_tags($_POST['content']);
    $dat = date('l j \of F Y h:i:s');
    if(createcomments($id, $username, $content, $dat, $pdo)){
      echo '<div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Yeaah</strong> Commentaire crée</div>';
    }
    else{
        echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Oups</strong> Mauvaise saisie</div>';
    }
}


$query = 'SELECT id, title, content, img, dat FROM articles WHERE :id = id';
$statement = $pdo->prepare($query);
$statement->execute([':id' => $id]);
while( $data = $statement->fetch(PDO::FETCH_ASSOC)):
  ?>
<div class="jumbotron">
      <h1><?php echo $data['title'];?></h1></br>
      <img height="150px" width="150px" src="img/<?php echo $data['img'];?>" /></br>
      <p><?php echo $data['content'];?></p></br>
      <p><?php echo $data['dat'];?></p></br>
    </div>
<?php endwhile; ?>


<div style="padding: 30px 50px;">
<div class="card border-primary mb-4" style="max-width: 20rem;">
  <div class="card-body">
    <form method="post" action="detail.php?id=<?php echo $id;?>">
      <label>Username : </label>
      <input type="text" class="form-control" name="username" required/></br>
      <label>Message : </label>
      <textarea class="form-control" name="content" rows="3"  required></textarea></br>
      <button type="submit" class="btn btn btn-secondary">Envoyer</button>
    </form>
    </div>
  </div>
</div>

<?php
$query = 'SELECT id, article_id, username, content, dat FROM comments WHERE :id = article_id ORDER BY id desc';
$statement = $pdo->prepare($query);
$statement->execute([':id' => $id]);
while( $data = $statement->fetch(PDO::FETCH_ASSOC)):
  ?>
<div class="jumbotron">
      <h1><?php echo $data['username'];?></h1></br>
      <p><?php echo $data['dat'];?></p></br>
      <p><?php echo $data['content'];?></p></br>
    </div>
<?php endwhile; ?>
