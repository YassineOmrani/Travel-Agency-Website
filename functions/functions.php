<?php

    
function clean($string){
    return htmlentities($string);
}
function redirect($location){
    
    return header("Location: {$location}");
}
function set_message($message){
    if (!empty($message)){
        $_SESSION['message'] = $message;
    }else{
        $message = "";
    }
}
function display_message(){
    if (isset( $_SESSION['message'])){
        echo  $_SESSION['message'];
        unset  ($_SESSION['message']);
    }
}

function validation_errors($error_message){
    $error_message = '
    <div class="alert alert-danger alert-danger" role="alert" style="margin-top:0px; margin-bottom: 0px;">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong>Warning!</strong> '.$error_message.'
    </div>';
    return $error_message;
}
function validate_user_registration(){
        
    $errors = [];
    $min = 3;
    $max = 8;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $numCin     = clean($_POST['numCin']);
        $nom        = clean($_POST['nom']);
        $prenom     = clean($_POST['prenom']);
        $password   = clean($_POST['Password']);
        $adresse    = clean($_POST['adresse']);
        $numTel     = clean($_POST['numTel']);
        $sexe       = clean($_POST['sexe']);

        if (empty($numCin)){
            $errors[] = "Your name can't be empty"; 
        }else if (strlen($numCin) < $max){
            $errors[] = "Your n° cin's length can't be less then ".$max." characters.";
        }
        if (empty($nom)){
            $errors[] = "Your nom can't be empty";
        }else if (strlen($nom) < $min){
            $errors[] = "Your nom's length can't be less then ".$min." characters.";
        }
        if (empty($prenom)){
            $errors[] = "Your prenom can't be empty";
        }else if (strlen($prenom) < $min){
            $errors[] = "Your prenom's length can't be less then ".$min." characters.";
        }
        if (empty($password)){
            $errors[] = "Password can't be empty";
        }else if (strlen($password) < $max){
            $errors[] = "Password must be at least ".$max." characters";
        }
        //  Checking if there's errors             
        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
        }else if ( register_user($numCin, $nom, $prenom, $password, $adresse, $numTel, $sexe)){
            set_message("<p class='bg-success text-center' >welcome $name we are happy you joined us </p>");
        }
    }
}
//  Registration function   
function register_user($numCin, $nom, $prenom, $password, $adresse, $numTel, $sexe){
       
    //  escaping the data helps us prevent SQL injection
        $numCin     = escape($numCin);
        $nom        = escape($nom);
        $prenom     = escape($prenom);
        $password   = escape($password);
        $adresse    = escape($adresse);
        $numTel     = escape($numTel);
        $sexe       = escape($sexe);


            $password = md5($password);
            $sql  = "INSERT INTO client(numCin, nom, prenom, adresse, numTel, sexe,password) VALUES('$numCin','$nom','$prenom','$adresse','$numTel','$sexe','$password') ";
            $result = query($sql);
            if (confirm($result)){
                return true;
            }
}
function validate_user_login(){
    
    $errors = [];
    $min = 3;
    $max = 8;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $numCin   = clean($_POST['numCin']);
        $password = clean($_POST['password']);
        if (empty($numCin)){
            $errors[] = "Num° Cin field can't be empty"; 
        }
        if (empty($password)){
            $errors[] = "Password filed can't be empty"; 
        }
        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
    }else{
            
            if ( login_user($numCin,$password)){
                redirect("logindex.php");
            }else{
                echo validation_errors("Your credentials are not correct!!");
       }
    }
}    
}
function login_user($numCin,$password){
    $sql = "SELECT idClient, password, nom, prenom FROM client WHERE numCin = '".$numCin."' ";
    $result = query($sql);
    confirm($result);
    if (row_count($result) == 1){
        $row = fetch_data($result);
        $db_password = $row['password'];
        if (md5($password) === $db_password){
            $_SESSION['numCin'] = $numCin;
            $_SESSION['fullname'] = "{$row['nom']} {$row['prenom']}";
            return true;
        }else{
            return false;
        }
    }
    return false;
}
function logged_in(){
    if (isset($_SESSION['numCin'])){
        return true;
    }else{
        return false;
    }
}

function validate_user_reservation(){
        
    $errors = [];
    $min = 3;
    $max = 8;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $numCin  = $_POST['numCin'];

        $sql = "
            SELECT idClient
            FROM client
            WHERE numCin = '$numCin'
        ";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);

        $idClient       = $row['idClient'];
        $idCircuit      = $_SESSION['idCircuit'];
        $dateDepart     = $_POST['dateDepart'];
        $dateDepart     = date("Y-m-d h:i:s",strtotime($dateDepart));
        $heureDepart    = $_POST['heureDepart'];
        $nbrPersonne    = $_POST['nbrPersonne'];
        

        if (empty($dateDepart)){
            $errors[] = "Date de Depart can't be empty"; 
        }
        if (empty($heureDepart)){
            $errors[] = "Heure de Depart can't be empty";
        }
        if (empty($numCin)){
            $errors[] = "Num° Cin  can't be empty";
        }

        //  Checking if there's errors             
        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
        }else{
            $sql1   = "INSERT INTO reservation(idClient, idCircuit, dateDepart, heureDepart, nbrPersonne) VALUES('$idClient','$idCircuit','$dateDepart','$heureDepart','$nbrPersonne') ";
            $result1 = query($sql1);
            confirm($result1);
            redirect('reservationPart2.php?nbrPersonne='.$nbrPersonne.'&idClient='.$idClient.'&&idCircuit='.$idCircuit);

        }
    }
}

function reserve_circuit($idClient, $idCircuit, $dateDepart, $heureDepart, $nbrPersonne){

            $sql   = "INSERT INTO reservation(idClient, idCircuit, dateDepart, heureDepart, nbrPersonne) VALUES('$idClient','$idCircuit','$dateDepart','$heureDepart','$nbrPersonne') ";
            $result = query($sql);

            if (confirm($result))
            {
                return true;
            }
}

function insertPerData($idClient, $nomP, $prenomP, $ageP){
    $sql = "INSERT INTO personneavecclient(idClient, nomP, prenomP, ageP) VALUES ('$idClient', '$nomP', '$prenomP', '$ageP')";
    $result = query($sql);
    confirm($result);
}

function validate_persons_info($nbrPersonne, $idClient){
    $errors = [];
    $np = "nomP";
    $pp = "prenomP";
    $ap = "ageP";
    $id = $idClient;
    $i = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cc'])){
        for ($i = 0  ; $i < $nbrPersonne ; $i++){

            $a = $np.$i;
            $b = $pp.$i;
            $c = $ap.$i;

            $$a = $_POST[$a];
            $$b = $_POST[$b];
            $$c = $_POST[$c];

            if (empty($$a)){
                $errors[] = 'nomP'.$i.' field cant be empty'; 
            }
            if (empty($$b)){
                $errors[] = 'prenomP'.$i.' filed cant be empty'; 
            }
            if (empty($$c)){
                $errors[] = 'ageP'.$i.' filed cant be empty'; 
            }

            $a = "";
            $b = "";
            $c = "";
        }
        if (!empty($errors)){
            foreach($errors as $error){
                //  Display errors
                echo validation_errors($error);
            }
            }else{
                for ($i = 0 ; $i < $nbrPersonne ; $i++ ){
                $a = $np.$i;
                $b = $pp.$i;
                $c = $ap.$i;
                
                $aa = $$a;
                $bb = $$b;
                $cc = $$c;

                $sql = "INSERT INTO personneavecclient(idClient, nomP, prenomP, ageP) VALUES ('$id', '$aa', '$bb', '$cc')";
                $result = query($sql);
                confirm ($result);
                
                $a = "";
                $b = "";
                $c = "";

                }
                redirect("logindex.php");
            }
    }
}

?>