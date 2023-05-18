<h2 style="text-align:center; margin-bottom: 15px">YOUR RESERVATIONS</h2>
<?php
    $reservation = $Reservation->get_reservation();
            echo '<table class="admin-table table table-primary table-striped">';
                echo '<thead>';
                    echo '<tr>';
                      echo '<th scope="col">First Name</th>';
                      echo '<th scope="col">Last name</th>';
                      echo '<th scope="col">Number of guests</th>';
                      echo '<th scope="col">Check-in Date</th>';
                      echo '<th scope="col">Destination</th>';
                      echo '<th scope="col"></th>';
                      echo '<th scope="col"></th>';
                      echo '<th scope="col"></th>';
                      echo '<th scope="col"></th>';
                      echo '<th scope="col"></th>';
                    echo '</tr>';
               echo '</thead>';
               echo '<tbody>';
                foreach($reservation as $r){
                    echo '<tr>';
                    echo '<td>'.$r->first_name.'</td>';
                    echo '<td>'.$r->last_name.'</td>';
                    echo '<td>'.$r->number_of_guests.'</td>';
                    echo '<td>'.$r->check_in_date.'</td>';
                    echo '<td>'.$r->destination.'</td>';
                    echo '<td colspan="4">
                            <form action="inc/reservation/edit.php" method="post">
                                <input type="hidden" name="form_id" value="'.$r->id.'"'.'>
                                <input type ="text" name="number_of_guests" placeholder="Change guest number">
                                <input placeholder="Change date" type="text" onfocus="(this.type = \'date\')" name="check_in_date" class="date">
                                <input type ="submit" name="update_reservation" value="Change">
                            </form>
                        </td>'; 
                    
                    echo '<td>
                            <form action="inc/reservation/delete.php" method="post">
                                <button type ="submit" name="delete_reservation" value="'.$r->id.'"'.'> <i class="fa-solid fa-x" style ="color: #e50606"></i></button>
                            </form>';
                    echo '</tr>';
                }
                echo '<tbody>';
                echo '</table>';

?>