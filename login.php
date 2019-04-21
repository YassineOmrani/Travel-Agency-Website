<?php
    require_once("inc/header.php");
    require_once("inc/nav.php");
?>
<div class="form-body without-side">
        <div class="website-logo">
 
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
                    validate_user_login();
                ?>
            </div>
                <div class="form-content">
                    <div class="form-items">
                        <h3>S'identifier</h3>
                        <p>Il faut s'identifier pour resérvé un circuit !</p>
                        <form Method="POST">
                            <input class="form-control" type="text" name="numCin" placeholder="N° Cin" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget21.html">Forget password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Or login with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <a href="register.php">s'inscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once("inc/footer.php");
?>