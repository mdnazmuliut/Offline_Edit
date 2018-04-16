<?php

$host = 'localhost'; 
$username = "root";
$password = "root";
$dbname = "local_history";

$ApiRequest= file_get_contents("php://input");
$RequestData= json_decode($ApiRequest);

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$saved_keys=array();
foreach ($RequestData as $field_data) {
 
        $sql = "INSERT INTO `local_history`.`fied_text` (`pid`, `field_name`, `text`, `updated_at`) "
                ."VALUES ('$field_data->pid', '$field_data->field_name', '$field_data->text', '$field_data->time' );";
        //if ($field_data->field_name=="field_4"){$sql=' asdf';}
        if (mysqli_query($conn, $sql)) {
            array_push( $saved_keys,$field_data->field_name.'_'.$field_data->pid);
        } else { 
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } 
        
       
} 



echo json_encode($saved_keys);
 
mysqli_close($conn);
?>