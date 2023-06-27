<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $doctorId = $_POST['app_doctor'];
  $patientId = $_POST['app_patient'];
  $receptionistId = $_POST['app_receptionist'];
  $date = $_POST['app_date'];
  $time = $_POST['app_time'];
  $description = $_POST['app_description'];

  // Get patient information from the database
  $sqlPatient = "SELECT name, surname, medicalaid_number FROM patients WHERE patients_id = $patientId";
  $resultPatient = $conn->query($sqlPatient);
  $rowPatient = $resultPatient->fetch_assoc();

  // Extract patient information
  $patientName = $rowPatient['name'];
  $patientSurname = $rowPatient['surname'];
  $medicalAidNumber = $rowPatient['medicalaid_number'];
  

  // Insert the appointment into the database
  $sqlInsert = "INSERT INTO appointments (name, surname, patient_id, date, time, doctor_id, receptionist_id, medicalaid_number,  description) VALUES ('$patientName', '$patientSurname', $patientId, '$date', '$time', $doctorId, $receptionistId, '$medicalAidNumber',  '$description')";

  if ($conn->query($sqlInsert) === TRUE) {
    // This gives an instruction to go back to a different page
    header("location: appointments.php");
  } else {
    echo "Error";
  }

  $conn->close();
}
?>