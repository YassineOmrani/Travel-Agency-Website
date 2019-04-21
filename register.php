<?php
    require_once("inc/header.php");
    require_once("inc/nav.php");
?>
<div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="container">
                    <?php
                        validate_user_registration();
                    ?>
                </div>
                <div class="form-content">
                    <div class="form-items">
                        <h3>S'inscrire</h3>
                        <form Method="post">
                            <input class="form-control" type="text"     name="nom" placeholder="Nom" required>
                            <input class="form-control" type="text"     name="prenom" placeholder="Prénom" required>    
                            <input class="form-control" type="text"     name="adresse" placeholder="Adresse" required>    
                            <input class="form-control" type="text"     name="numCin" placeholder="N° Cin" required>
                            <input class="form-control" type="password" name="Password" placeholder="Password" required>
                            <input class="form-control" type="text"     name="numTel" placeholder="N° Telephone" required>
                            <select name="sexe" class="sexe form-control" style="background-color:#F7F7F7 !important ; border: none;">
                                <option value="Homme" class="sexe">Homme</option>
                                <option value="Femme" class="sexe">Femme</option>
                            </select>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">S'inscrire</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Or S'inscrire with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <a href="login.php">S'identifier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once("inc/footer.php");
?>