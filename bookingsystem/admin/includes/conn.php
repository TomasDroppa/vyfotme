<?php
//database conection
$conn = new mysqli('localhost', 'root', '', 'galerie');
if($conn->connect_error){
    die ("Connection failed: " .$conn->connect_error);
}


?>