<?php

if (isset($_POST["submittedS"]) && $_POST["submittedS"])
{ 

    $comment = trim($_POST["comment"]);
    $popupappointment = trim($_POST["popupappointment"]);
echo $comment;echo $popupappointment;
       $db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");
        if ($db->connect_error)
        {
            die ("Connection failed: " . $db->connect_error );
        }
        
        $q1 = "Update appointmentDB set comment='$comment' where appointment_id='$popupappointment' ";
 
                    $r1=$db->query($q1);
            if ($r1 == true)
            {      
                header("Location: index.php");
                $db->close();
                exit();
            }



}
?>     