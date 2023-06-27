<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Appointment</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Create Appointment</h2>
    <form method="post" action="appointments_create_new.php">
      <div class="form-group">
        <label for="app_doctor">Select Doctor</label>
        <select class="form-control" name="app_doctor">
          <?php
          // SQL query for doctors table to select the doctor's name, surname, and ID
          $sqlD = "SELECT name, surname, doctor_id FROM doctors ORDER BY doctor_id ASC";
          $resultD = $conn->query($sqlD);

          // Populate select with the names of each doctor. The doctor's ID will become the value
          while ($rowD = $resultD->fetch_assoc()) {
            echo '<option value="' . $rowD['doctor_id'] . '"> ' . $rowD['name'] . ' ' . $rowD['surname'] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="app_patient">Select Patient</label>
        <select class="form-control" name="app_patient">
          <?php
          // SQL query for patients table to select the patient's name, surname, and ID
          $sqlP = "SELECT name, surname, patients_id FROM patients ORDER BY patients_id ASC";
          $resultP = $conn->query($sqlP);

          // Populate select with the names of each patient. The patient's ID will become the value
          while ($rowP = $resultP->fetch_assoc()) {
            echo '<option value="' . $rowP['patients_id'] . '"> ' . $rowP['name'] . ' ' . $rowP['surname'] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="app_receptionist">Select Receptionist</label>
        <select class="form-control" name="app_receptionist">
          <?php
          // SQL query for receptionists table to select the receptionist's name, surname, and ID
          $sqlR = "SELECT name, surname, receptionists_id FROM receptionists ORDER BY receptionists_id ASC";
          $resultR = $conn->query($sqlR);

          // Populate select with the names of each receptionist. The receptionist's ID will become the value
          while ($rowR = $resultR->fetch_assoc()) {
            echo '<option value="' . $rowR['receptionists_id'] . '"> ' . $rowR['name'] . ' ' . $rowR['surname'] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="app_date">Date</label>
        <input type="date" class="form-control" name="app_date">
      </div>

      <div class="form-group">
        <label for="app_time">Time</label>
        <input type="time" class="form-control" name="app_time">
      </div>

      <div class="form-group">
        <label for="app_description">Description</label>
        <textarea class="form-control" name="app_description" rows="4"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Create Appointment</button>
    </form>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
