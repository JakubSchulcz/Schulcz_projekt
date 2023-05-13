<?php
require('../Database.php');
$db =  new Database();
if(isset($_POST['delete_reservation'])){
    try{
        $id = $_POST["delete_reservation"];
        $sql = $sql = 'DELETE FROM reservation WHERE id ='.$id;
        $db->conn->exec($sql);
        header("Location: http://localhost/projekt/reservation.php");
        exit();
    }catch(PDOException $e){
        print_r($e->getMessage());
    }
    
}
?>