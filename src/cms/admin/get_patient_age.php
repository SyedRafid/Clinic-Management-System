<?php
include('include/config.php');

if (isset($_POST['patientName'])) {
    $patientName = $_POST['patientName'];

    $query = "SELECT PatientAge FROM tblpatient WHERE PatientName = '$patientName'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $patientAge = $row['PatientAge'];

        echo $patientAge;
    }
}
?>
