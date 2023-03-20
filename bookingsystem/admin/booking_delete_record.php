<?php
    //smaže záznam 

    include "includes/conn.php";
    session_start();

    if(isset($_POST['submit'])){
        $ID=$_POST['ID'];
        $sql="DELETE FROM bookings_record WHERE ID='$ID'";
        if($conn ->query($sql)){
            $_SESSION['success'] ="Záznam byl úspěšně odstraněn";
        }else{
            $_SESSION['error'] ="Záznam nebyl úspěšně odstraněn";
        }
    }else{
        $_SESSION['error'] ="Prosím vyberte záznam k odstranění";
    }
    header("location: index.php");

?>

