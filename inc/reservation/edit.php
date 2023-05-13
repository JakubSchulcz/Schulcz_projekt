<?php
require('../config.php');
$reservation = $Reservation->get_reservation();
$db =  new Database();
if(isset($_POST['update_reservation'])){

    $data = [
        'id' => $_POST["form_id"],
        'first_name' => $_POST["first_name"],
        'last_name' => $_POST["last_name"],
    ];
    foreach ($reservation as $r){
        if($r->id==$data['id']){
            if(empty($data['first_name'])){
                $data['first_name'] = $r->first_name;
            }
            if(empty($data['last_name'])){
                $data['last_name'] = $r->last_name;
            }
        }
    }
    try{
        $query =  "UPDATE reservation SET first_name=:first_name, last_name=:last_name WHERE id=:id";
        $query_run = $db->conn->prepare($query);
        $query_run->execute($data);
        if(isset($_SERVER['HTTP_REFFERER'])){
            header("Location: {$_SERVER['HTTP_REFFERER']}");
        }else{
            header("Location: ../../reservation.php");
        }
        

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
}else{
    print_r("F");
}
?>