<?php
session_start();
error_reporting(0);
include('include/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
} else {
    $appointmentID = $_GET['appointmentID'];

    if ($appointment['userId'] !== null) {
        $sql = "SELECT users.fullName AS PatientName, users.email AS pemail, users.gender AS pgender, users.address AS paddress, users.city AS pcity, appointment.*
        FROM appointment
        JOIN users ON appointment.userId = users.id 
        WHERE appointment.id = '$appointmentID'";
    } else {
        $sql = "SELECT tblpatient.PatientName AS PatientName, tblpatient.PatientEmail AS pemail, tblpatient.PatientGender AS pgender, tblpatient.PatientAdd AS paddress, appointment.*
        FROM appointment
        JOIN tblpatient ON appointment.patientID = tblpatient.ID 
        WHERE appointment.id = '$appointmentID'";
    }
    
    $result = mysqli_query($con, $sql);
    

    if ($result) {
        $appointmentData = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($con);
    }

    if (isset($_POST['submit'])) {
        $docid = $_SESSION['id'];
        $patname = $_POST['patname'];
        $patcontact = $_POST['patcontact'];
        $patemail = $_POST['patemail'];
        $gender = $_POST['gender'];
        $pataddress = $_POST['pataddress'];
        $patage = $_POST['patage'];
        $medhis = $_POST['medhis'];



        $checkSql = "SELECT ID FROM tblpatient WHERE PatientEmail = '$patemail'";
        $checkResult = mysqli_query($con, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            // Patient with this email already exists
            $patientData = mysqli_fetch_assoc($checkResult);

            // Update the appointment with the patient's ID
            $patientID = $patientData['ID'];
            $updateApSql = "UPDATE appointment SET patientID = '$patientID' WHERE id = '$appointmentID'";

            if (mysqli_query($con, $updateApSql)) {
                // Update was successful
            } else {
                $_SESSION['msg'] = "Error: " . mysqli_error($con);
            }

            echo "<script>
          if (confirm('Patient with this email already exists. The appointment has been associated with the existing patient. Do you want to go to Manage-Patient?')) {
            window.location.href = 'manage-patient.php';
          }
    </script>";
        } else {
            // Patient with this email doesn't exist, proceed to insert a new patient
            $insertSql = "INSERT INTO tblpatient(Docid, PatientName, PatientContno, PatientEmail, PatientGender, PatientAdd, PatientAge, PatientMedhis) VALUES ('$docid', '$patname', '$patcontact', '$patemail', '$gender', '$pataddress', '$patage', '$medhis')";

            if (mysqli_query($con, $insertSql)) {
                $_SESSION['msg'] = "Patient info added Successfully !!";
                header('location:manage-patient.php');
            } else {
                $_SESSION['msg'] = "Error: " . mysqli_error($con);
            }

            // Also, update the appointment with the new patient's ID
            $newPatientID = mysqli_insert_id($con);
            $updateApSql = "UPDATE appointment SET patientID = '$newPatientID' WHERE id = '$appointmentID'";

            if (mysqli_query($con, $updateApSql)) {
                // Update was successful
            } else {
                $_SESSION['msg'] = "Error: " . mysqli_error($con);
            }
        }


        $updateSql = "UPDATE appointment SET action = '0' WHERE id = '$appointmentID'";
        if (mysqli_query($con, $updateSql)) {
        } else {
            $_SESSION['msg'] = "Error: " . mysqli_error($con);
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Add Patient</title>
    <link rel="icon" href="assets/images/icon.png">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#patemail").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('include/header.php'); ?>

            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Doctot | Add Patient</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Doctor</span>
                                </li>
                                <li class="active">
                                    <span>Add Patient</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Add Patient</h5>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" name="" method="post">

                                                    <div class="form-group">
                                                        <label for="doctorname">
                                                            Patient Name
                                                        </label>
                                                        <input type="text" name="patname" class="form-control" placeholder="Enter Patient Name" required="true" value="<?php echo $appointmentData['PatientName']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Patient Contact no
                                                        </label>
                                                        <input type="text" name="patcontact" class="form-control" placeholder="Enter Patient Contact no" required="true" maxlength="15" pattern="[0-9]+" value="<?php echo $appointmentData['Pcontact']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Patient Email
                                                        </label>
                                                        <input type="email" id="patemail" name="patemail" class="form-control" placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()" value="<?php echo $appointmentData['pemail']; ?>">
                                                        <span id="user-availability-status1" style="font-size:12px;"></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="block">Gender</label>
                                                        <?php
                                                        $pgender = $appointmentData['pgender'];
                                                        $maleChecked = ($pgender === 'male') ? 'checked' : '';
                                                        $femaleChecked = ($pgender === 'female') ? 'checked' : '';
                                                        ?>
                                                        <div class="clip-radio radio-primary">
                                                            <input type="radio" id="rg-female" name="gender" value="female" <?php echo $femaleChecked; ?>>
                                                            <label for="rg-female">Female</label>
                                                            <input type="radio" id="rg-male" name="gender" value="male" <?php echo $maleChecked; ?>>
                                                            <label for="rg-male">Male</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">Patient Address</label>
                                                        <textarea name="pataddress" class="form-control" placeholder="Enter Patient Address" required="true">
                                                 <?php echo $appointmentData['paddress'] . ', ' . $appointmentData['pcity']; ?>
                                                      </textarea>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Patient Age
                                                        </label>
                                                        <input type="text" name="patage" class="form-control" placeholder="Enter Patient Age" required="true" value="<?php echo $appointmentData['age']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Medical History
                                                        </label>
                                                        <textarea type="text" name="medhis" class="form-control" placeholder="Enter Patient Medical History(if any)" required="true">
														<?php echo $appointmentData['medicalHistory']; ?> </textarea>
                                                    </div>

                                                    <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                                        Add
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- start: FOOTER -->
    <?php include('include/footer.php'); ?>
    <!-- end: FOOTER -->

    <!-- start: SETTINGS -->
    <?php include('include/setting.php'); ?>

    <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>