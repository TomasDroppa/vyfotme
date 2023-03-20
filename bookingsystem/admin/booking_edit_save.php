
<?php
// uložení editace
session_start();
include "includes/conn.php";
if(isset($_POST{'submit'})){
    $ID =$_POST['ID'];
    $jmeno =$_POST['jmeno'];
    $prijmeni =$_POST['prijmeni'];
    $telefon =$_POST['telefon'];
    $email =$_POST['email'];

    $sql ="UPDATE bookings_record SET jmeno='$jmeno', prijmeni='$prijmeni', telefon='$telefon', email='$email'WHERE ID='$ID'";
    if($conn->query($sql)){
        $_SESSION['success'] ="Úprava byla úspěšně provedena";
    }else{
        $_SESSION['error'] = $conn->error;
    }

}else{
    $_SESSION['error'] = "Vyberte čkověka pro editaci";
}
header('location:index.php');   ////////////

?>