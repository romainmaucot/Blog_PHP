<?php

function sameuser($username, $pdo){
  $query = 'SELECT username FROM users';
  $statement = $pdo->prepare($query);
  $statement->execute();
  while( $data = $statement->fetch(PDO::FETCH_ASSOC)) {
    if($username == $data['username']){
      return true;
    }
  }
}

function inscription($username, $password, $pdo){
  $query = 'INSERT INTO users (username, password) VALUES (:username, :password)';
  $statement = $pdo->prepare($query);
  $status = $statement->execute([':username' => $username, ':password' => $password]);
  return $status !== false ? true : false;

}

function connexion($username, $password, $pdo){
  $query = 'SELECT id, username, password FROM users';
  $statement = $pdo->prepare($query);
  $statement->execute();
  while( $data = $statement->fetch(PDO::FETCH_ASSOC)) {
    if($username == $data['username'] && password_verify($password, $data['password'])){
      $_SESSION['id'] = $data['id'];
      $_SESSION['username'] = $data['username'];
      return true;
    }
  }
}

function verifysession($username, $id, $pdo){
  $id = strip_tags($id);
  $username= strip_tags($username);
  $query = 'SELECT id, username FROM users';
  $statement = $pdo->prepare($query);
  $statement->execute();
  while( $data = $statement->fetch(PDO::FETCH_ASSOC)) {
    if($id == $data['id'] && $username = $data['username']){
      return true;
    }
  }
}

function uploadimg($nameimg, $chemin){

  $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
  $extension_upload = strtolower(  substr(  strrchr($nameimg, '.')  ,1)  );
  $name = $nameimg;
  if (in_array($extension_upload,$extensions_valides)){
    $nom = "img/{$name}";
    $resultat = move_uploaded_file($chemin,$nom);
    if ($resultat) return true;
  }
}


function createarticle($title, $content, $img, $id, $dat, $pdo){
  $query = 'INSERT INTO articles (user_id, title, content, img, dat) VALUES (:id, :title, :content, :img, :dat)';
  $statement = $pdo->prepare($query);
  $status = $statement->execute([':id' => $id, ':title' => $title, ':content' => $content, ':img' => $img, ':dat' => $dat]);
  return $status !== false ? true : false;
}

function updatearticle($title, $content, $id, $dat, $pdo){
  $query = 'UPDATE articles SET title = :title, content = :content, dat = :dat WHERE id = :id';
  $statement = $pdo->prepare($query);
  $status = $statement->execute([':id' => $id, ':title' => $title, ':content' => $content, ':dat' => $dat]);
  return $status !== false ? true : false;
}

function delete($id, $pdo){
  $query = 'DELETE FROM articles WHERE id = :id';
  $statement = $pdo->prepare($query);
  $status = $statement->execute([':id' => $id]);
  return $status !== false ? true : false;
}

function createcomments($article_id, $username, $content, $dat, $pdo){
  $query = 'INSERT INTO comments (article_id, username, content, dat) VALUES (:article_id, :username, :content, :dat)';
  $statement = $pdo->prepare($query);
  $status = $statement->execute([':article_id' => $article_id, ':username' => $username, ':content' => $content, ':dat' => $dat]);
  return $status !== false ? true : false;
}
