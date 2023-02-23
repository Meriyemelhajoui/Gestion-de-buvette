<?php
session_start();
if(!isset($_SESSION['ouvert'])){
    header("location:index.php");
}
?>

<?php include_once("header.php"); ?>
<!-- Navbar Section Ends Here -->
<!-- manage cat Section Ends Here -->
<section class="catt">
    <div class="container">
        <div class="gerer">
           <h2>GERER<br>ORDERS</h2>
        </div>
        <br>
    <table class="tbl2">
                    <tr>
                        <th>Produit</th>
                        <th>prix</th>
                        <th>Quantite</th>
                        <th>Statut</th>
                        <th>Totale</th>
                        <th>Client</th>
                        <th>Table</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                       include_once("../includes/connexion.php");
                       $stmt=$pdo->prepare('SELECT * FROM orders');
                       $stmt->execute();
                       $tab=$stmt->fetchAll();
                    ?>
                    <?php for($i=0;$i<count($tab);$i++):?>
                    <tr>
                        <td><?= $tab[$i]['nom_produit'];?></td>
                        <td><?= $tab[$i]['prix_produit'];?></td>
                        <td><?= $tab[$i]['qty_produit'];?></td>
                        <td><?= $tab[$i]['status'];?></td>
                        <td><?= $tab[$i]['total'];?></td>
                        <td><?= $tab[$i]['client'];?></td>
                        <td><?= $tab[$i]['num_table'];?></td>
                        <td><?= $tab[$i]['date'];?></td>
                        <td class="butt">
                            <a href="modif-ord.php?id=<?=$tab[$i]['id'];?>" class="bt1">Modifier</a>
                        </td>
                    </tr>
                    <?php endfor; ?>
    </table>
    </div>

</section>

<!-- manage cat Section Ends Here -->

<!-- footer Section Starts Here -->
<?php include_once("footer.php"); ?>