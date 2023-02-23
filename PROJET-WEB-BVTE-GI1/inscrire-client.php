<?php
       error_reporting(0);
       $nom=$_POST["nom"];
       $prenom=$_POST["prenom"];
       $email=$_POST["email"];
       $pass=$_POST["password"];
       $repass=$_POST["Cpassword"];
       $valider=$_POST["submit"];
       $erreur="";
       if(isset($valider)){
          if(empty($nom)) {$erreur="Nom laissé vide!";}
          elseif(empty($prenom)) {$erreur="Prénom laissé vide!";}
          elseif(empty($email)) {$erreur="Email laissé vide!";}
          elseif(empty($pass)){ $erreur="Mot de passe laissé vide!";}
          elseif($pass!=$repass) {$erreur="Mots de passe non identiques!";}
          else{
             include_once("includes/connexion.php");
             $stmt=$pdo->prepare('SELECT id_user FROM users WHERE email=? limit 1');
             $stmt->execute(array($email));
             $tab=$stmt->fetchAll();
             if(count($tab)>0)
                $erreur="Email existe déjà!";
             else{
                $ins=$pdo->prepare('INSERT INTO users(nom,prenom,email,password) values(?,?,?,?)');
                if($ins->execute(array($nom,$prenom,$email,md5($pass))))
                   header("location:index.php");
             }   
          }
       }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="SVG/bvte-logo.svg">
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <title>Inscrire</title>
</head>
<body>
<section>
    <div class="container">
        <div class="logo2">
            <img src="svg/bvte-lo.svg" alt="bvte"/> 
         </div>
         <div class="for">
        <form action="#" method="POST" class="login-email">
            <p class="login-text">Bienvenue dans votre<br>ecole buvette</p>
            <div class="input-group">
                <input type="username" name="nom" placeholder="Nom" required>
            </div>
            <div class="input-group">
                <input type="username" name="prenom" placeholder="Prenom" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div class="input-group">
                <input type="password" name="Cpassword" placeholder="Confirm MDP" required>
            </div>
            <div class="error">
                <?php echo $erreur ?>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">S'inscrire</button>
            </div>
            <p class="SU">Vous avez un comptet? <a href="login-client.php" >Se Connecter</a></p>
            
           
        </form>
    </div>

    <div class="typing-container">
        <span id="sentence" class="sentence">SiteWeb-Projet par </span>
        <span id="feature-text"></span>
        <span class="input-cursor"></span>
      </div>
    </div>
</section>
      <script type="text/javascript" src="js/app3.js"></script>

</body>
</html>