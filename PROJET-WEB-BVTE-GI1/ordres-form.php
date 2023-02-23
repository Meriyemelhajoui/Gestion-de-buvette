<?php
   error_reporting(0);
   session_start();
   if(!isset($_SESSION['autoriser'])){
    header("location:index.php");
   }
   $nomComplet=strtoupper($_SESSION['nom'])." ".strtolower($_SESSION['prenom']);
   $email=$_SESSION['email'];
?>
<?php
    $idProd=$_GET['id'];
    include_once("includes/connexion.php");
    $stmt=$pdo->prepare('SELECT * FROM produit WHERE id=? limit 1');
    $stmt->execute([$idProd]);
    $tb=$stmt->fetchAll();
?>
<?php
   $tel=$_POST['contact'];
   $table=$_POST['table'];
   $produit=$tb[0]['nom'];
   $prix=$tb[0]['prix'];
   $qty=$_POST['qty'];
   $status="en attente";
   $total=$prix *  $qty;
   $client= $nomComplet;
   $date = new \DateTime();
   $date->setTimezone(new \DateTimeZone('+0100'));
   $date=$date->format('Y-m-d H:i:s');
   $valider=$_POST['submit'];
   $erreur="";
   if(isset($valider)){
    $ins=$pdo->prepare('INSERT INTO orders(nom_produit,prix_produit,qty_produit,total,client,num_table,status,date) values(?,?,?,?,?,?,?,?)');
    if($ins->execute([$produit,$prix,$qty,$total,$client,$table,$status,$date]))
             header("location:produits.php");
   }
?>
<?php include_once("header.php"); ?>

    <!--ord Section Starts Here -->
    <section class="orderpage">
        <div class="container">
            <h2 class="text-center">Remplir cette formulaire<br>et confirmer votre ordre.</h2>

            <form action="#" method="POST" class="order" >
                <fieldset class="ord">
                    <legend>Produit choisit</legend>
                    <div class="food-menu-img">
                        <img src="<?= $tb[0]['image'];?>" alt="Chicke Hawain Pizza">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?= $tb[0]['nom'];?></h3>
                        <p class="food-price"><?= $tb[0]['prix'];?>DH</p>

                        <div class="order-label">Quantite</div>
                        <input type="number" name="qty" class="input-responsive" value="1" min="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Details</legend>
                    <div class="order-label">Nom</div>
                    <input type="text" name="full-name" placeholder="Etudiant X" class="input-responsive" value="<?=$nomComplet;?>" required>

                    <div class="order-label">Tele</div>
                    <input type="tel" name="contact" placeholder="06********" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Etudiant@etu.uae.ac.ma" class="input-responsive" value="<?= $email;?>" required>

                    <div class="order-label">Table</div>
                    <input name="table" rows="10" placeholder="table number: 10" class="input-responsive"  required></input>

                    <input type="submit" name="submit" value="Confirmer Ordre" class="but-h b3">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php include_once("footer.php"); ?>