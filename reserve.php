    <?php
        include ('inc/header.php');
        include ('inc/logNav.php');
        if (!isset($_SESSION['numCin'])){
            redirect("login.php");
        }
        if($_GET['idc'] != ''){
            $id = $_GET['idc'];
            $_SESSION['idCircuit'] = $id;
        }
            $sql = "SELECT * FROM circuit where idCircuit = '$id'";
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
                            validate_user_reservation();
                        ?>
                    </div>
                    <form action="reservationPart2.php" method="POST">
                        <label for="">Num Cin:</label>
                        <input type="text" name="numCin" class="form-control" placeholder="example: 12345678">
                        <label for="">Date Départ:</label>
                        <input type="text" name="dateDepart" class="form-control input datepicker" value="Mm/Dd/Yy">
                        <label for="">Heure Départ:</label>
                        <input type="time" name="heureDepart" class="form-control" value="10:00">
                        <label for="">Nbr personne avec vous:</label>
                        <select class="form-control" name="nbrPersonne" id="nbrP">
                            <option value="1" selected>Une Personne</option>
                            <option value="2">Deux Personnes</option>
                            <option value="3">Trois Personnes</option>
                            <option value="4">Quatre Personnes</option>
                        </select>
                        <br>
                        <div class="text-center">
                            <input type="submit" value="Réservé la circuit" class="btn btn-primary">
                        </div>
                    </form>
                <br>
                <br>
            </div>
        </div>
        </div>

    <!-- <script src="js/nbrPersonne.js"></script> -->


                        <!-- <div class="form-group">
                            <h1>Info Personne Num° 1</h1>
                            <br>
                            <input type="text" name="nomP1" placeholder="Nom personne Num° 1" class="form-control">
                            <br>
                            <input type="text" name="prenomP1" placeholder="Prénom personne Num° 1" class="form-control">
                            <br>
                            <input type="text" name="ageP1" placeholder="Age personne Num° 1" class="form-control">
                            <br>
                        </div> -->