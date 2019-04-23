<?php
        include ('inc/header.php');
        include ('inc/logNav.php');

        if(($_GET['nbrPersonne'] != '') && ($_GET['idClient'] != '') && ($_GET['idCircuit'] != '')){
            $idClient               = $_GET['idClient'];
            $nbrPersonne            = $_GET['nbrPersonne'];
            $idCircuit              = $_GET['idCircuit'];
        }
            $sql = "SELECT * FROM circuit where idCircuit = '$idCircuit'";
            $result = query($sql);
            confirm($result);
            $row = mysqli_fetch_assoc($result);
    ?>
        <div class="container" >
        <h3 class="display-4 text-center">Réservation du Circuit Num° <?php echo $row['numCircuit']; ?></h3>
        <div class="row">
            <div class="col-lg-6">
                    <h3 class="display-3 text-center" style="color:#191970;">                        
                        <?php 
                            echo $row["themeCircuit"];
                        ?>
                    </h3>
                    <div class="text-center">
                        <?php 
                            echo '<img src="'.$row["image_url"].'" alt="" style="width:80%;border-radius: 22%;Border:10px solid #40E0D0;" >'
                        ?>
                    </div>
            </div>

            <div class="col-lg-6" style="margin-top: 100px;">
                        <div>
                            <?php
                                validate_persons_info($nbrPersonne, $idClient);
                            ?>
                        </div>
                        <form action="" method="POST">
                        <?php
                            for ($i = 0 ; $i < $nbrPersonne; $i++){
                        ?>
                            <h1>Info Personne Num° <?php echo $i; ?></h1>
                            <br>
                            <input type="text" name="nomP<?php echo $i; ?>" placeholder="Nom personne Num° <?php echo $i; ?>" class="form-control">
                            <br>
                            <input type="text" name="prenomP<?php echo $i; ?>" placeholder="Prénom personne Num° <?php echo $i; ?>" class="form-control">
                            <br>
                            <input type="text" name="ageP<?php echo $i; ?>" placeholder="Age personne Num° <?php echo $i; ?>" class="form-control">
                            <br>
                        <?php
                            }
                        ?>
                        <div class="text-center">
                            <input type="submit" value="Save Persons info" name="cc" class="btn btn-primary">
                        </div>
                        </form>
                <br>
                <br>
            </div>
        </div>
        </div>

     <!-- <script src="js/nbrPersonne.js"></script> -->


                        <!-- 
                        <div class="form-group">
                            <h1>Info Personne Num° 1</h1>
                            <br>
                            <input type="text" name="nomP1" placeholder="Nom personne Num° 1" class="form-control">
                            <br>
                            <input type="text" name="prenomP1" placeholder="Prénom personne Num° 1" class="form-control">
                            <br>
                            <input type="text" name="ageP1" placeholder="Age personne Num° 1" class="form-control">
                            <br>
                        </div> 
                        -->