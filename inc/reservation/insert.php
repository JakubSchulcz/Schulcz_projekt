<?php
require('../database.php');
$db =  new Database();
if(isset($_POST['reservation'])){
 
    $data = [
        'first_name' => $_POST["first_name"],
        'last_name' => $_POST["last_name"],
        'phone_number' => $_POST["phone_number"],
        'email' => $_POST["email"],
        'number_of_guests' => $_POST["number_of_guests"],
        'check_in_date' => $_POST["check_in_date"],
        'destination' => $_POST["destination"]
    ];
    try{
        $query = "INSERT INTO reservation (first_name, last_name,phone_number,email,number_of_guests,check_in_date,destination) VALUES (:first_name, :last_name, :phone_number, :email, :number_of_guests, :check_in_date, :destination)";
        $query_run = $db->conn->prepare($query);
        $query_run->execute($data);
        header("Location: http://localhost/projekt/reservation.php");
        exit();
    }catch(PDOException $e){
        print_r($e->getMessage());
    }   
}else{
    print_r("F");
}
?>