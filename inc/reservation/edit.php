<?php
require('../config.php');
$reservation = $Reservation->get_reservation();
$db =  new Database();
if(isset($_POST['update_reservation'])){

    $data = [
        'id' => $_POST["form_id"],
        'number_of_guests' => $_POST["number_of_guests"],
        'check_in_date' => $_POST["check_in_date"],
    ];
    foreach ($reservation as $r){
        if($r->id==$data['id']){
            if(empty($data['number_of_guests'])){
                $data['number_of_guests'] = $r->number_of_guests;
            }
            if(empty($data['check_in_date'])){
                $data['check_in_date'] = $r->check_in_date;
            }
        }
    }
    try{
        $query =  "UPDATE reservation SET number_of_guests=:number_of_guests, check_in_date=:check_in_date WHERE id=:id";
        $query_run = $db->conn->prepare($query);
        $query_run->execute($data);
        
        header("Location: ../../reservation.php");
        exit();

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
}else{
    print_r("F");
}
?>