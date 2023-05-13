<?php
    class Reservation{
        public $db;

        function get_reservation(){
            $this->db = new Database();
           
            try{
                $query = $this->db->conn->query("SELECT * FROM reservation");
                $reservation = $query->fetchAll(PDO::FETCH_OBJ);
                return $reservation;
                }catch(PDOException $e){
                    print_r($e->getMessage());
                } 
            }
    }
    $Reservation = new Reservation();
?>