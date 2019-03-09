<?php>

 $db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");

// (2) Check connection: 
// if failed to establish a connection, then exit the php program
     if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }


// (3) Run your SQL commands in PHP...
$sql = "CREATE TABLE Appointment (
appointment_id INT NOT NULL AUTO_INCREMENT,
doctor_id INT NOT NULL,
user_id INT NOT NULL,
AD DATE NOT NULL,
ind INT NOT NULL,
PRIMARY KEY (appointment_id)
)";

if ($db->query($sql) === TRUE) {
    echo "Table User created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// (4) Always close Database connection:
  $db->close();

?>