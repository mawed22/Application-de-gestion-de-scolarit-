<?php
include("php/dbconnect.php");

$error = '';
if(isset($_POST['login']))
{

$username =  mysqli_real_escape_string($conn,trim($_POST['username']));
$password =  mysqli_real_escape_string($conn,$_POST['password']);

if($username=='' || $password=='')
{
$error='Veuillez remplir tous les champs';
}

$sql = "select * from user where username='".$username."' and password = '".md5($password)."'";

$q = $conn->query($sql);
if($q->num_rows==1)
{
    $res = $q->fetch_assoc();
    $_SESSION['rainbow_username']=$res['username'];
    $_SESSION['rainbow_uid']=$res['id'];
    $_SESSION['rainbow_name']=$res['name'];
    header('Location: dashboard.php');

  }else
 {
   $error = 'Nom d\'utilisateur ou mot de passe invalide';
 }

}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Page de connexion</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <meta charset="utf-8">
</head>
<body >
  <div class="form">

    <form class="login-form" action="login.php" method="post">
      <h2>Veuillez-vous connecter sur GestEduc</h2>
              <?php
                  if($error!='')
                  {
                  echo '<h5 class="text-danger text-center">'.$error.'</h5>';
                  }
                  ?>
      <div class="icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
              <input type="text" placeholder="Nom d'utilisateur" name="username" required>
              <input type="password" placeholder="Mot de passe" name="password" required>
              <button type= "submit" name="login">Se Connecter</button>
            <p class="options"><a style="color: #fff; text-decoration: none; font-weight:bold;" href="index.php">Retour</a></p>
    </form>

  </div>

</body>
</html>
