<?php>

 $db = new mysqli("localhost", "feng209j", "qazwsx88", "feng209j");












// (2) Check connection: 
// if failed to establish a connection, then exit the php program
     if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }


// (3) Run your SQL commands in PHP...
$sql = "CREATE TABLE appointmentDB (
appointment_id INT NOT NULL AUTO_INCREMENT,
doctor_id INT,
patient_id INT,
appointmen_date DATE NOT NULL,
time INT NOT NULL,
comment VARCHAR(255) null,
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