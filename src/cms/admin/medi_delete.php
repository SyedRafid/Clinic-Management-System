<?php
session_start();
error_reporting(0);
include('include/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location: logout.php');
} else {
if (isset($_POST['recordID'])) {
    $recordID = $_POST['recordID'];

    $sql = "DELETE FROM tblmedicalhistory WHERE ID = $recordID";

    if (mysqli_query($con, $sql)) {
        echo 'success';  // Return 'success' when deletion is successful
    } else {
        echo 'error';    // Return 'error' if there's a problem with deletion
    }
}
}
?>
