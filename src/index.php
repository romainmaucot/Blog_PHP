<?php require 'header.php';?>

<h1 style="padding: 30px 100px;">Tout les articles</h1>

<?php
$articleinpage=5;
$query = 'SELECT COUNT(*) AS total FROM articles';
$statement = $pdo->prepare($query);
$statement->execute();
$data = $statement->fetch(PDO::FETCH_ASSOC);
$total=$data['total'];
$numberpage=ceil($total/$articleinpage);
if(isset($_GET['page']))
{
     $actualpage=intval($_GET['page']);
     if($actualpage>$numberpage) {
          $actualpage=$numberpage;
     }
}
else{
     $actualpage=1;
}
$firstvalue=($actualpage-1)*$articleinpage;

$query = 'SELECT a.id, a.user_id, a.title, a.content, a.img, a.dat, u.username FROM articles a INNER JOIN users u ON a.user_id = u.id ORDER BY a.id DESC LIMIT '.$firstvalue.', '.$articleinpage.'';
$statement = $pdo->prepare($query);
$statement->execute();
while( $data = $statement->fetch(PDO::FETCH_ASSOC)):
?>
    <div class="jumbotron">
      <h2 class="display-3"><?php echo $data['title'];?></h2>
      <img height="150px" width="150px" src="img/<?php echo $data['img'];?>"/>
      <hr class="my-4">
      <p class="lead">Écrit par <?php echo $data['username'];?></p>
      <p class="lead"><?php echo $data['dat'];?></p>
      <p class="lead">
        <a class="btn btn-secondary  btn-lg" href="detail.php?id=<?php echo $data['id'];?>" role="button">Consulter</a>
      </p>
    </div>
<? endwhile;

echo '<ul align="center" class="pagination">';
for($i=1; $i<=$numberpage; $i++)
{
     if($i==$actualpage)
     {
         echo '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
     }
     else
     {
          echo '<li class="page-item"> <a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li> ';
     }
}
echo '</ul>';
?>
