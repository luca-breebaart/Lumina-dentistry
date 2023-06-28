<?php

include 'db.php';

$receptionist_id = $_GET['receptionists_id'];

$sql = "DELETE FROM receptionists WHERE receptionists_id = $receptionist_id";

$conn->query($sql);

$conn->close();

header("location: receptionist.php");

?>