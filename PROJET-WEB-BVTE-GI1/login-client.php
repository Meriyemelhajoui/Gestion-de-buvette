<?php
error_reporting(0);
$email=$_POST['email'];
$pass=$_POST['password'];
$valider=$_POST['submit'];
$erreur="";
if(isset($valider)){
    include_once("includes/connexion.php");
    $stmt=$pdo->prepare('SELECT * FROM users WHERE email=? AND password=? limit 1');
    $stmt->execute([$email,md5($pass)]);
    $tab=$stmt->fetchALL();
    if(count($tab)>0){
        $_SESSION['nom']=$tab[0]['nom'];
        $_SESSION['prenom']=$tab[0]['prenom'];
        $_SESSION['email']=$tab[0]['email'];
        $_SESSION['mdp']=$pass;
        $_SESSION["autoriser"]="oui";
        header("location:accueil.php");
    }else{
        $erreur="Login ou Mot de passe incorrectes";
    }
}
?>
<?php if(!isset($_SESSION['autoriser'])):?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="SVG/bvte-logo.svg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/stylee.css">

    <title>Connecter</title>
</head>
<body>
<section>
    <div class="container">
        <div class="logo">
            <img src="svg/bvte-lo.svg" alt="bvte"/> 
         </div>
         <div class="for">
        <form action="#" method="POST" class="login-email" >
            <p class="login-text">Bienvenue dans votre<br>ecole buvette</p>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mot De Passe" required>
            </div>
            <?php if(isset($erreur)): ?>
                <div class="error">
                   <?php echo $erreur ?>
                   </div>
            <?php endif; ?>
            <div class="input-group">
                <button name="submit" class="btn">Se connecter</button>
            </div>
            <p class="SU">Vous n'avez pas de compte? <a href="inscrire-client.php" >inscrivez-vous</a></p>
        </form>
    </div>
    </div>
    <div class="typing-container2">
        <span id="sentence" class="sentence">SiteWeb-Projet par </span>
        <span id="feature-text"></span>
        <span class="input-cursor"></span>
      </div>
</section>
      <script type="text/javascript" src="js/app3.js"></script>
</body>
</html>
<?php endif;?>


