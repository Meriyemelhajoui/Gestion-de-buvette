<?php
error_reporting(0);
$username=$_POST['adminUsername'];
$pass=$_POST['adminPassword'];
$valider=$_POST['adminValider'];
$erreur="";
if(isset($valider)){
    include_once("../includes/connexion.php");
    $stmt=$pdo->prepare('SELECT * FROM admin WHERE admin_username=? AND admin_password=? limit 1');
    $stmt->execute([$username,$pass]);
    $tab=$stmt->fetchALL();
    if(count($tab)>0){
        $_SESSION["ouvert"]="oui";
        header("location:admin-accueil.php");
    }else{
       
        $erreur="Nom d'utilisteur ou Mot de passe incorrectes";
    }
}

?>


<?php if(!isset($_SESSION['ouvert'])):?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="SVG/bvte-logo.svg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/stylee.css">

    <title>Login</title>
</head>
<body>
    <section>
    <div class="container">
        <div class="logo">
            <img src="svg/bvte-lo.svg" alt="bvte"/> 
         </div>
         <div class="for">
        <form class="login-email" action="#" method="POST">
            <p class="login-text">Bienvenu dans votre<br>platforme Mr.Admin</p>
            <div class="input-group">
                <input type="text" name="adminUsername" placeholder="Utilisateur" required >
            </div>
            <div class="input-group">
                <input type="password" name="adminPassword" placeholder="Mot De Passe" required>
            </div>
            <div class="error">
                <?php echo $erreur ?>
            </div>
            <div class="input-group">
                <button class="btn" name="adminValider">Se connecter</button>
            </div>
            <p class="SU">E-BVTE</p>
            
           
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