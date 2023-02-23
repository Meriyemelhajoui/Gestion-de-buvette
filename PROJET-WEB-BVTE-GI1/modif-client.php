<?php
   error_reporting(0);
   session_start();
   if(!isset($_SESSION['autoriser'])){
    header("location:index.php");
   }
   $nomComplet=strtoupper($_SESSION['nom'])." ".strtolower($_SESSION['prenom']);
   $email=$_SESSION['email'];
   $mdp=$_POST['mdpe'];
   $mdpn=$_POST['mdpn'];
   $cmdpn=$_POST['cmdpn'];
   $valider=$_POST['submit'];
   $error="";
   if(isset($valider)){
    include_once("includes/connexion.php");
    $sel=$pdo->prepare('SELECT * FROM users WHERE password=? AND email=?');
    $sel->execute([md5($mdp),$email]);
    $tb=$sel->fetchAll();
    if(count($tb)>0){
        if( $mdpn != $cmdpn)
            $error="Mots de passe différents";
        else{
            $stmt=$pdo->prepare('UPDATE users SET password=? WHERE email=?');
            $stmt->execute([md5($mdpn),$email]);
            header("location:modif-client.php");
        }
    }
    else{
        $error="Mot de passe existant est incorrecte"; 
        
    }

   }

?>
<?php include_once("header.php"); ?>

<section class="modif">
    <div class="container">
<h2 class="text-center">MODIFIER<br>PROFIL</h2>
<form action="" method="POST">
    <div>
        <form action="" method="POST">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Email" value="<?=$email;?>" disabled>
          <label for="MDP existant">MDP existant</label>
          <input type="password" id="MDP existant" name="mdpe" placeholder="MDP existant" required>
          <label for="MDP nouveau">MDP nouveau</label>
          <input type="password" id="MDP nouveau" name="mdpn" placeholder="MDP Nouveau" required>
          <label for="Confirmer MDP">Confirmer MDP</label>
          <input type="password" id="Confirmer MDP" name="cmdpn" placeholder="Confirmer MDP" required>
          <div class="erreur">
          <?php
            echo $error;
          ?>
          </div>
          <input type="submit" value="Confirmer" name="submit">
        </form>
      </div>
</form>
</div>
</section>
<?php include_once("footer.php"); ?>